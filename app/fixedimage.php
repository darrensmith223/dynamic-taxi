<?php
$image = "https://www.sparkpost.com/wp-content/uploads/2016/07/SparkPost_Logo_Gray-Orange-1.png";
header('Cache-Control: no-cache, max-age=0');
header('Content-type: image/png');

imagepng(imagecreatefrompng($image));
?>
