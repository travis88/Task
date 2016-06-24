<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Массив из 10 значений</title>
</head>
<body>
    <style>
        * {
            font-family: Ubuntu, sans-serif;
            font-size: medium;
        }
    </style>
</body>
</html>
<?php
for ($i = 0; $i < 10; $i++) {
    $mas[$i] = rand(0, 100);
}

print "<p>Массив из 10 рандомных значений от 0 до 100</p>";
for ($i = 0; $i < count($mas); $i++) {
    print $mas[$i];
    print"<br>";
}

for ($i = 0; $i < count($mas) - 1; $i++) {
    for ($j = $i + 1; $j < count($mas); $j++) {
        if ($mas[$i] < $mas[$j]) {
            $tmp = $mas[$i];
            $mas[$i] = $mas[$j];
            $mas[$j] = $tmp;
        }
    }
}

print"<br>";
print"<br>";
print"<br>";

print "<p>Первые три максимальных значения</p>";
for ($i = 0; $i < 3; $i++) {
    print $mas[$i];
    print"<br>";
}
