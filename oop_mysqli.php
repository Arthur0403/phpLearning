<?php

$host = 'localhost'; //127.0.0.1
$login = 'myExperiment'; //name mySql user
$password = 'myExperiment';
$port = 3306; //default. Maybe 3309
$db = 'myExperiment';

define('ERROR_CODE_CONNECT', 1); //Есди не удалось соединиться

$mysqli = new mysqli($host, $login, $password, $db, $port);

if($mysqli->connect_errno)
{
    echo 'Неудалось установить соединение с БД. Ошибка: ' . $mysqli->connect_error.PHP_EOL;
    exit(ERROR_CODE_CONNECT);
}

//Формируем SQL-запрос
$sql ='SELECT * FROM news';

$res = $mysqli->query($sql);
$row = $res->fetch_assoc();

echo '<h2>1 Новость</h2>';
echo 'Анонс: ' . $row['anons'] . '<br>' . PHP_EOL;
echo 'Название: ' . $row['title'] . '<br>' . PHP_EOL;
echo 'Текст: ' . $row['text'] . '<br>' . PHP_EOL;
echo '<hr>' . PHP_EOL;

// как выводить много новостей сразу в ооп стиле?
//Изменение записи
$sql = 'UPDATE news SET anons="New anons text 955" WHERE id=2';
if($mysqli->query($sql))
{
    echo '<p>Данные успешно изменены</p>';
}

$mysqli->close();