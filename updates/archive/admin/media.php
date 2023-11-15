

  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12" style="padding-left:0;">
            <div class="card" style="background: none !important; box-shadow: none; ">
                <div class="card-content" style="
    background: none !important;
    padding:0 !important;
    font: 14px normal Arial, Helvetica, sans-serif;
    z-index: -4;">

                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">


                        <link href="assets/css/filemanager.css" rel="stylesheet"/>

                        <div class="filemanager">

                            <div class="createfolder">
                                <a class="btn material-icons createfolder-icon">folder</a>  
                                <form action="index.php" method="get">
                                <input type="text" name="new" placeholder="Create folder name.." />
                                <input type="hidden" name="page" value="media" />
                                <input type="hidden" name="type" value="folder" />
                                </form>
                            </div>


                            <div class="search">
                                <input type="search" class="search-input" placeholder="Find a file.." />
                            </div>


                            <div class="breadcrumbs"></div>

                            <ul class="data" style="display: block !important;"></ul>

                            <div class="nothingfound">
                                <div class="nofiles"></div>
                                <span>{{No files here.}}</span>
                            </div>

                        </div>


                        <!-- Include our script files -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/filemanager.js"></script>


<script type="text/javascript">

                init_filemanager();


</script>


<form id="js-form-url-upload" class="form-inline" onsubmit="#" method="POST" action="">
                        <input type="hidden" name="type" value="upload" aria-label="hidden" aria-hidden="true">
                        <input type="url" placeholder="URL" name="uploadurl" required class="form-control" style="width: 80%">
                        <button type="submit" class="btn btn-primary ml-3">UPlOAD</button>

                    </form>


<?php

    //upload using url
    if($_POST) {

        $path = '../files/';


        $url = !empty($_REQUEST["uploadurl"]) && preg_match("|^http(s)?://.+$|", stripslashes($_REQUEST["uploadurl"])) ? stripslashes($_REQUEST["uploadurl"]) : null;
        $use_curl = false;
        echo 'x';
        $temp_file = tempnam(sys_get_temp_dir(), "upload-");
        $fileinfo = new stdClass();
        $fileinfo->name = trim(basename($url), ".\x00..\x20");

        function event_callback ($message) {
            global $callback;
            // echo json_encode($message);
        }

        function get_file_path () {
            global $path, $fileinfo, $temp_file;
            return $path."/".basename($fileinfo->name);
        }

        $err = false;
        if (!$url) {
            $success = false;
        } else if ($use_curl) {
            @$fp = fopen($temp_file, "w");
            @$ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOPROGRESS, false );
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_FILE, $fp);
            @$success = curl_exec($ch);
            $curl_info = curl_getinfo($ch);
            if (!$success) {
                $err = array("message" => curl_error($ch));
            }
            @curl_close($ch);
            fclose($fp);
            $fileinfo->size = $curl_info["size_download"];
            $fileinfo->type = $curl_info["content_type"];
        } else {
            $ctx = stream_context_create();
            @$success = copy($url, $temp_file, $ctx);
            if (!$success) {
                $err = error_get_last();
            }
        }

        if ($success) {
            $success = rename($temp_file, get_file_path());
        }

        if ($success) {
            event_callback(array("done" => $fileinfo));
        } else {
            unlink($temp_file);
            if (!$err) {
                $err = array("message" => "Invalid url parameter");
            }
            event_callback(array("fail" => $err));
        }
    }

    // exit();
// }



// Delete file / folder
if (isset($_GET['del'])) {
    $del = $_GET['del'];

    // if ($del != '' && $del != '..' && $del != '.') {
        $path = '../files';
        chmod($del, 0777);
        $is_dir = is_dir($del);
        if($is_dir){
            rmdir($del);
        }elseif (unlink($del)) {
            // $msg = $is_dir ? 'Folder <b>%s</b> deleted' : 'File <b>%s</b> deleted';
        } else {
            // $msg = $is_dir ? 'Folder <b>%s</b> not deleted' : 'File <b>%s</b> not deleted';
        }
    // } else {
        // fm_set_msg('Wrong file or folder name', 'error');
    // }
    // fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}

// Create folder
if (isset($_GET['new']) && isset($_GET['type'])) {
    $type = $_GET['type'];
    $new = strip_tags($_GET['new']);
    if ($new != '' && $new != '..' && $new != '.') {
        $path = '../files/';
        if ($_GET['type'] == "file") {
            if (!file_exists($path . '/' . $new)) {
                @fopen($path . '/' . $new, 'w') or die('Cannot open file:  ' . $new);
                // fm_set_msg(sprintf('File <b>%s</b> created', fm_enc($new)));
            } else {
                // fm_set_msg(sprintf('File <b>%s</b> already exists', fm_enc($new)), 'alert');
            }
        } else {
            if (mkdir($path . '/' . $new, 0777) === true) {
                // fm_set_msg(sprintf('Folder <b>%s</b> created', $new));
            } elseif (mkdir($path . '/' . $new, 0777) === $path . '/' . $new) {
                // fm_set_msg(sprintf('Folder <b>%s</b> already exists', fm_enc($new)), 'alert');
            } else {
                // fm_set_msg(sprintf('Folder <b>%s</b> not created', fm_enc($new)), 'error');
            }
        }
    } else {
        // fm_set_msg('Wrong folder name', 'error');
    }
    // fm_redirect(FM_SELF_URL . '?p=' . urlencode(FM_PATH));
}



