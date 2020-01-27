<?php

$host = 'localhost'; //127.0.0.1
$login = 'myExperiment'; //name mySql user
$password = 'myExperiment';
$port = 3306; //default. Maybe 3309
$db = 'myExperiment';

define('ERROR_CODE_CONNECT', 1); //Есди не удалось соединиться

//mysql - работает только до 7 версии; Удалено из ветки 7
//mysqli - действующая

//Функциональный стиль

//Подключение к бд
$mysqli= mysqli_connect($host, $login, $password, $db, $port);

//Проверить, удалось ли соединиться с бд
if(mysqli_connect_errno()) {
    echo 'Неудалось установить соединение с БД. Ошибка: ' . mysqli_connect_error().PHP_EOL;
    exit(ERROR_CODE_CONNECT);
}

//Формируем SQL-запрос
$sql ='SELECT * FROM news';

//Выполняем запрос и получаем результат
$res = mysqli_query($mysqli, $sql); //type resource

//Получаем массив
$rowArrayAll = mysqli_fetch_all($res); //сейчас по умоланию как индексный массив

//$rowArrayAll = mysqli_fetch_array($res); //данные дублируются

echo PHP_EOL.'---Rows---<br>'.PHP_EOL;
for($i = 0; $i < count($rowArrayAll); $i++)
{
    //Одна запись
    $row = $rowArrayAll[$i];
    echo 'Анонс: ' . $row[1] . '<br>' . PHP_EOL;
    echo 'Название: ' . $row[2] . '<br>' . PHP_EOL;
    echo 'Текст: ' . $row[3] . '<br>' . PHP_EOL;
    echo '<hr>' . PHP_EOL;
}

//Вариант 2, получение данных в цикле
echo '<h2>Вариант 2</h2>';
echo '<hr>';
$res = mysqli_query($mysqli, $sql); //type resource
//$row = mysqli_fetch_assoc($res); //1 запись

while ($row = mysqli_fetch_assoc($res))
{
    echo 'Анонс: ' . $row['anons'] . '<br>' . PHP_EOL;
    echo 'Название: ' . $row['title'] . '<br>' . PHP_EOL;
    echo 'Текст: ' . $row['text'] . '<br>' . PHP_EOL;
    echo '<hr>' . PHP_EOL;
}

//Удаление данных
$sql = 'UPDATE news SET anons="New anons text" WHERE id=1';
//выполняем
if(mysqli_query($mysqli, $sql))
{
    echo '<p>Данные успешно изменены</p>';
}

//закрываем соединение с бд
mysqli_close($mysqli);