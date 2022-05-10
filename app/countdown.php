<?php 
$image = "https://www.sparkpost.com/wp-content/uploads/2016/07/SparkPost_Logo_Gray-Orange-1.png";
$imageData = base64_encode(file_get_contents($image));
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
echo '<img src="data:image/png;base64,'.$imageData.'">';
?>
