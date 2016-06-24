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
$content = file_get_contents("index.html");

$arr = explode(" ", $content);
for ($i = 0; $i < count($arr); $i++) {
    var_dump(strip_tags($arr[$i]));
}

//var_dump(strip_tags($arr));