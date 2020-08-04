<?php
/* $_POST is only populated by application/x-www-form-urlencoded or multipart/form-data requests.
if ($_POST) {
    $file   = $_POST['file'];
    $data   = stripslashes($_POST['data']);
    file_put_contents('public/models/333', $_POST);
} */
$json = file_get_contents('php://input');
$post = json_decode($json, true);
$file = $post['file'];
$data = $post['data'];
file_put_contents('public/models/'.$file, $data);
$image   = $post['image'];
$thumbnail = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
file_put_contents('public/models/'.$file.'.png', $thumbnail);
?>
