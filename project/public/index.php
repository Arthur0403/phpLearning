<?php
require_once ('../config/config.php');
require_once ('../engine/db.php');

//Получаем новости
$sqlSelectNews = 'SELECT * FROM news';
$news = getAssocResult($sqlSelectNews);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <style>
        .anons {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <h1>News</h1>
    <?php foreach ($news as $new): ?>
    <h3><?= $new['title'] ?></h3>
    <p class="anons"><?= $new['anons'] ?></p>
    <div><?= $new['text'] ?></div>
    <?php endforeach; ?>
</body>
</html>
