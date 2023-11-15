<?php
if(isset($_POST['data']))
{
    parse_str($_POST['data'], $searcharray);
    $data = array(
        "name"   => $searcharray['name'],
        "email"   => $searcharray['email'],
        "message"   => $searcharray['message'],
    );
    echo json_encode($data);
}
mail('info@bcgconsulting.cz','Kontaktní formulář', "".$data['name']."\n".$data['email']."\n".$data['message']."");

$arr = array('error' => '');
echo json_encode($arr);