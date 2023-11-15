<?php
/* Template name: Invoice */


ob_start();

$page = str_replace('/', '', $_GET['page']);
// TRY  TO FIND PAGE
$post = find_content('data/invoices.csv', $page);
$gallery = $post['gallery'];
$gallery = array_filter($gallery);

$gallery = array_reverse($gallery);

$data[$Array_row] = $post;





get_plugin_invoice();





$html = ob_get_contents();
ob_end_clean();

echo $html;

die();

?>

