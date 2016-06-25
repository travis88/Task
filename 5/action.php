<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация про город</title>
</head>
<?php
$city = $_GET['city'];
include 'simple_html_dom.php';
$html = new simple_html_dom();
//Население
$request = "https://ru.wikipedia.org/wiki/" . $city;
$html->load_file($request);

//Парсим страницу википедии и находим таблицу с нужными данными
$collection = $html->find("table[class=infobox vcard]");
foreach ($collection as $item) {
    $elements = strip_tags($item); //Получим строку без тегов
    $element = explode(" ", $elements); //Порежем строку на отдельные элементы и запишем в массив
    
    //Флаги нужны чтобы записать в них позиции "Населения" и "Плотности"
    $flag1 = 0;
    $flag2 = 0;
    for ($i = 0; $i < count($element); $i++) {
        if (strcasecmp($element[$i], "Население") == 0) {
            $flag1 = $i;
        }
        if (strcasecmp($element[$i], "Плотность") == 0) {
            $flag2 = $i;
        }
    }
    
    for ($j = $flag1; $j < $flag2; $j++) {
        echo $element[$j]." ";
    }
}
echo "<br>";
//Погода
$request2 = "http://openweathermap.org/find?q=".$city;
//echo $request2;
//$html2 = new simple_html_dom();
$html->load_file($request2);
//echo $html;
$collection2 = $html->find("table[class=table]");
foreach ($collection2 as $item2) {
    $elements2 = strip_tags($item2);
    $element2 = explode(" ", $elements2);
    foreach ($element2 as $value2) {
        echo $value2;
    }
}

?>
