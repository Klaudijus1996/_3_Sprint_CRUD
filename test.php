<?php 
    $stringas = "kekw_pepega";
    $kitoks = "Ajajaja-lolo";
    function replace($str) {
        $rg = '/_|-/i';
        if (preg_match($rg, $str)) {
            $string = preg_replace($rg, ' ', $str);
        } else {
            return $str;
        }
        return $string;
    }
    echo "<h1>".replace($stringas)."</h1>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello?</h1>
    <h1><?=replace($stringas)?></h1>
    <h1><?=replace($kitoks)?></h1>
</body>
</html>