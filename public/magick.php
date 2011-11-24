<?php
header('Content-type: image/jpeg');

$file = $_REQUEST["file"];
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

$image = new Imagick($file);
$image->adaptiveResizeImage($x,$y);

echo $image;
?>

