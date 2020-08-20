<?php 
    $URI = $_SERVER['REQUEST_URI'];
    $str = substr($uri, 0, strripos($uri, '/'));
    echo "<h1>$str</h1>";
    // if ($URI == )
?>