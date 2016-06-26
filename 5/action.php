<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Информация про город</title>
    <style>
        * {
            font-family: Ubuntu, sans-serif;
        }
    </style>
</head>
<?php
$city = $_GET['city'];
echo $city."<br>";
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
//Используем функцию перевода в транслит для городов написанных на кириллице 
$citytranslit = rus2translit($city);
$request2 = "https://pogoda.yandex.ru/".$citytranslit;
$html->load_file($request2);
$collection2 = $html->find("div[class=current-weather__thermometer_type_now]");
foreach ($collection2 as $item2) {
    $elements2 = strip_tags($item2);
    $element2 = explode(" ", $elements2);
    foreach ($element2 as $value2) {
        echo "Погода ".$value2."<br>";
    }
}

function rus2translit($string) {
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

?>
