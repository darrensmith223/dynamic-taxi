<?php 
$image = "https://www.sparkpost.com/wp-content/uploads/2016/07/SparkPost_Logo_Gray-Orange-1.png";
$imageData = base64_encode(file_get_contents($image));
header('Cache-Control: no-cache, max-age=0');
echo '<img src="data:image/png;base64,'.$imageData.'">';
?>
