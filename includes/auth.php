<?php
include "../functions.php";
header('Access-Control-Allow-Origin: *');
class HtpasswdAuth
{
    private $passwdFile = NULL;

    function __construct($passwdFile)
    {
        $this->passwdFile = $passwdFile;
    }   

    public function matches($username, $password)
    {
        $lines = file($this->passwdFile);
        foreach ($lines as $line)
        {
            $arr = explode(":", $line);
            $fileUsername = $arr[0];
            if ($fileUsername == $username)
            {
                $filePasswd = trim($arr[1]);
                if (strpos($filePasswd, '$apr1') === 0)
                {
                    // MD5
                    $passParts = explode('$', $filePasswd);
                    $salt = $passParts[2];
                    $hashed = $this->cryptApr1Md5($password, $salt);
                    return $hashed == $filePasswd;
                }
                else
                {
                    // Crypt
                    $salt = substr($filePasswd, 0, 2);
                    $hashed = crypt($password, $salt);
                    return $hashed == $filePasswd;
                }
            }
        }
        return false;
    }

    // Slight adaption of http://www.php.net/manual/en/function.crypt.php#73619
    private function cryptApr1Md5($plainpasswd, $salt)
    {
        $len = strlen($plainpasswd);
        $text = $plainpasswd.'$apr1$'.$salt;
        $bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
        for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
        for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
        $bin = pack("H32", md5($text));
        for($i = 0; $i < 1000; $i++) {
            $new = ($i & 1) ? $plainpasswd : $bin;
            if ($i % 3) $new .= $salt;
            if ($i % 7) $new .= $plainpasswd;
            $new .= ($i & 1) ? $bin : $plainpasswd;
            $bin = pack("H32", md5($new));
        }
        $tmp = '';
        for ($i = 0; $i < 5; $i++) {
            $k = $i + 6;
            $j = $i + 12;
            if ($j == 16) $j = 5;
            $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
        }
        $tmp = chr(0).chr(0).$bin[11].$tmp;
        $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
        "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        return "$"."apr1"."$".$salt."$".$tmp;
    }
}




$auth = new HtpasswdAuth('../admin/.htpasswd');

session_start();
if (strtolower($_SERVER['REQUEST_METHOD']) == 'get')
{
    $username = isset($_GET['username']) ? $_GET['username'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;
    if ($auth->matches($username, $password))
    {
        echo 'ok';
        // add_notifications('You have new subscriber info@cleversync.com.');
        add_notifications(''.$username.' {{was logged in}}.');
        $_SESSION['user'] = $username;
        // header('location:http://'.$_GET['username'].':'.$_GET['password'].'@dadok.cz/layla/admin/index.php');
    }
    else
    {
        die ('Incorrect username or password');
    }
} 
else if (isset($_REQUEST['logout']))
{
    session_destroy();
}
?>