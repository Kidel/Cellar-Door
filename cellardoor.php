<?php

/* 
 * Cellar Door
 * PHP - jQuery - CSS
 * Author: Gaetano Bonofiglio - ByteAround.com
 * 
 * This script will scan 'cellardoor/bg/' folder and look for *.jpg files. Files will be added and randomized in a cycle that will change body background every 10 seconds (by default).
 * For transition please include cellardoor/cd.css in your page.
 * To make this script work please include this php file in your php page and upload files and folders with the correct hierarchy as shown in the demo.
 * Call cellarDoor(); after your jQuery.js import. You can change speed, randomization and folder as arguments.
 * Example:
 * <link rel="stylesheet" href="cellardoor/cd.css">
 * <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 * <?php 
 *       include 'cellardoor.php'; 
 *       cellarDoor(20); //will make the background switch every 20 seconds
 * ?>
 * The PHP function will generate a jQuery script with switch and preload function. Animation is managed by CSS. Requires jQuery.
 * Lazy load. Every iteration only preloads the next background.
 */


function cellarDoor($seconds=10, $shuffle=true, $dir='cellardoor/bg/') {
	$images = glob($dir.'*.jpg');
	if ($shuffle) shuffle($images);

    echo '
		<script>
		  $(function() {
				var body = $(\'body\');
				var backgrounds = new Array(';

	$num = count($images);
	for ($i=0;$i<$num;$i++) {
		echo '\'url("'.$images[$i].'")\'';
		if(($i+1)<$num) echo ',';
	}

	echo ');
				var current = 0;
				var len = backgrounds.length;
				function preload(str) {
					var quoted = $.map(str.split(\'"\'), function(substr, i) {
					   return (i % 2) ? substr : null;
					});
				    $(\'<img />\').attr( { src:quoted, class:"cd-preload" } ).appendTo(\'body\').css(\'display\',\'none\');
				}
				function nextBackground() {
					body.css(
							\'background\',
							backgrounds[current = ++current % len]
						);
					preload(backgrounds[(current+1)% len]);
					setTimeout(nextBackground, '.$seconds.'000);
				}
				setTimeout(nextBackground, '.$seconds.'000);
				body.css(\'background\', backgrounds[0]);
				preload(backgrounds[1]);
			});
		</script>
		';
}

?>
