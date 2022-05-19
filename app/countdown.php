<?php

    // Initialize
    date_default_timezone_set("America/New_York");
	include 'GIFEncoder.class.php';
	
	$time = $_GET['time'];
	$end_time = new DateTime(date('r',strtotime($time)));
	$current_time = time();
	$now = new DateTime(date('r', $current_time));
	$frames = array();	
	$durations = array();

    // Build Background Image
	$image_height = $_GET['ht'];
	$image_width = (16 * $image_height / 3);
    $background_image = imagecreate($image_width, $image_height);
	imagecolorallocate($background_image, 255, 255, 255); 

    // Build Text Animation
    $duration = 100;  // milliseconds
    $font_size = (2 * $image_height / 3);
    $x_offset = 0.01 * $image_width;
    $y_offset = 0.83 * $image_height;
    $font_path = __DIR__ . DIRECTORY_SEPARATOR . 'Futura.ttc';
    $font_color_r = 0;
    $font_color_g = 0;
    $font_color_b = 0;
    $font_color = imagecolorallocate($background_image, $font_color_r, $font_color_g, $font_color_b);
    $font = array(
		'size' => $font_size, 
		'angle' => 0, 
		'x_offset' => $x_offset, 
		'y_offset' => $y_offset, 
		'file' => $font_path, 
		'color' => $font_color
	);
    for($i = 0; $i <= 60; $i++){
        
        $interval = date_diff($end_time, $now);
        
        // Check if time is up
        if($end_time < $now){
            $background_image = imagecreate($image_width, $image_height);
			$text = $interval->format('00:00:00:00');
			imagettftext($background_image , $font['size'] , $font['angle'] , $font['x_offset'] , $font['y_offset'] , $font['color'] , $font['file'], $text );
			ob_start();  
			imagegif($background_image);
			$frames[]=ob_get_contents();
			$durations[]=$duration;  
			$loops = 1;  
			ob_end_clean(); 
			break;
		} else {
            $background_image = imagecreate($image_width, $image_height);
			$text = $interval->format('%a %H %I %S');
			imagettftext ($background_image , $font['size'] , $font['angle'] , $font['x_offset'] , $font['y_offset'] , $font['color'] , $font['file'], $text );
			ob_start();
			imagegif($background_image);  
			$frames[]=ob_get_contents();
			$durations[]=$duration;
			$loops = 0;
			ob_end_clean();
		}

		$now->modify('+1 second');

    }

    // Create GIF
    header('Content-type: image/png');
    header('Cache-Control: no-cache, max-age=0');
    
	$gif = new AnimatedGif($frames,$durations,$loops);
	$gif->display();

?>
