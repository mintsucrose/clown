<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров</title>
    <style type="text/css">
        body{
    background-image: url('ящики!!!.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100vh;
    font-family: 'Roboto', sans-serif;
    align-items: center;
    justify-content: center;
    text-align: center;
}
.tx{
    padding-top: 230px;
}
        </style>
</head>
<body>
<div class="tx">
    <h1>Список товаров</h1>
    <?
    include "product.php";
    ?>
    <br>
    <a href="vvod_tovars.php">Добавить товар</a><br>
    <a href="ud_tovars.php">Удалить товар</a><br>
    <a href="table_tovars.php">Посмотреть в виде таблицы</a><br></div>
    <a href="registr.php">регистрация</a><br></div>
</body>
</html>