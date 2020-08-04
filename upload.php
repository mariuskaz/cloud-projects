<?php
/* $_POST is only populated by application/x-www-form-urlencoded or multipart/form-data requests.
if ($_POST) {
    $file   = $_POST['file'];
    $data   =  stripslashes($_POST['data']);
    file_put_contents('public/docs/'.$file, $data);
} */
$json = file_get_contents('php://input');
$post = json_decode($json, true);
$file = $post['file'];
$data = $post['data'];
file_put_contents('public/docs/'.$file, $data);
?>
