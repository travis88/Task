<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация про город</title>
</head>
<?php
include 'simple_html_dom.php';
$html = new simple_html_dom();
$city = 'london';
$request = "https://www.google.ru/maps/place/".$city;
//echo $request;
$html->load_file("https://yandex.ru");
echo $html;

//$element = $html->find("p");
//echo $element[0];
?> 
