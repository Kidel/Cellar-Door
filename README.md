# Cellar-Door
Cellar Door is a PHP function that will scan a folder with background images and generate a jQuery script to switch them as class cellardoor background every 10 seconds (as default). CSS transition animation is included. Lazy load policy (only next picture is pre-loaded).

 * Cellar Door
 * PHP - jQuery - CSS
 * Author: Gaetano Bonofiglio - ByteAround.com
  
  
This script will scan 'cellardoor/bg/' folder and look for *.jpg files. Files will be added and randomized in a cycle that will change body background every 10 seconds (by default). 
For transition please include cellardoor/cd.css in your page. 
To make this script work please include this php file in your php page and upload files and folders with the correct hierarchy and be sure to import jQuery. 
Call cellarDoor(); after your jQuery.js import. You can change speed, randomization and folder as arguments.  
Example: 
```
<link rel="stylesheet" href="cellardoor/cd.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php 
     include 'cellardoor.php'; 
     cellarDoor(20); //will make the background switch every 20 seconds
?>
```
  
The PHP function will generate a jQuery script with switch and preload function. Animation is managed by CSS. Requires jQuery.
Lazy load. Every iteration only preloads the next background.
