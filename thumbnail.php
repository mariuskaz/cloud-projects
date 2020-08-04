<?php
if ($_POST) {
    $file   = $_POST['file'];
    $image   = $_POST['thumbnail'];
    $thumb = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
    file_put_contents('public/models/'.$file.'.png', $thumb);
}
?>
