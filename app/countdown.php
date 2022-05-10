<?php
header('Content-type: image/png');
header('Cache-Control: no-cache, max-age=0');

$png_image = imagecreate(350, 150);
imagecolorallocate($png_image, 15, 142, 210);
$black = imagecolorallocate($png_image, 0, 0, 0);
$text = time();
imagestring($png_image, 5, 0, 0, $text, $black);
imagepng($png_image);
imagedestroy($png_image);
?>
