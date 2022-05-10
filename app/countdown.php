<html>
 <head>
  <title>Countdown</title>
 </head>
 <body>
 <?php 
 $image = "https://www.sparkpost.com/wp-content/uploads/2016/07/SparkPost_Logo_Gray-Orange-1.png";
 $imageData = base64_encode(file_get_contents($image));
 echo '<img src="data:image/png;base64,'.$imageData.'">';
 ?> 
 </body>
</html>
