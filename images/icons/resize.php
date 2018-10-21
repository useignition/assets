<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    // *** Include the class
    include("resize.class.php");

    // *** 1) Initialise / load image
    $resizeObj = new resize($_GET['icon']);

    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
    $resizeObj -> resizeImage($_GET['w'], $_GET['h'], 'exact');

    // *** 3) Save image ('image-name', 'quality [int]')
    $name = rand();
    $resizeObj->saveImage("$name.png", 100);

    header('Content-Type: image/png');
    header('Content-Disposition: inline; filename="'.basename("$name.png").'"');
    echo file_get_contents("$name.png");
    unlink("$name.png");
    die('');
?>