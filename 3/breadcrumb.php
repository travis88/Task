<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Script</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
</body>
</html>

<?php
//$j = $_GET['number'];
//$content = file_get_contents("index.html");
//$element = strip_tags($elements);
//echo $element;
//echo $content;
//$arr = explode(" ", $content);
//foreach ($arr as $item) {
//    echo $item;
//}


$content = file_get_contents("index.html");
$element = strip_tags($content);
$elements = explode(" ", $element);
//foreach ($elements as $item) {
//    echo $item;
//}

for ($i = 0; $i < count($elements); $i++) {
    if (strcasecmp($elements[$i], "") != 0 or strcasecmp($elements[$i], "") == 1) {
        echo $i . ": " . $elements[$i] . "<br>";
    }
}