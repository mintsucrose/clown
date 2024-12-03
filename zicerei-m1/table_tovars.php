<?
include "func.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад товаров -> Информация о товарах</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3 align="center">Список товаров</h3>
    <form action="#" method="post">
        <label for="category">Выбор по категории </label>
        <select name="category">
        <option value="Все">Все</option>
<?
echo show_categories();
?>
</select>
<input type="submit" value="Фильтр" name="filtr">
</form>
<br>
<form action="zakaz.php" method="post">
<table width="100%" border="2">
    <tr>
        <td>Номер</td>
        <td>Наименование</td>
        <td>Категория</td>
        <td>Цена</td>
        <td>Количество</td>
        <td>Срок годности</td>
        <td>Изображение</td>
        <td>Подробнее</td>
        <td>Добавить в корзину</td>
</tr>
<?php

if(isset($_POST["filtr"]) OR isset($_POST["sort"]) OR isset($_POST["search"])){
    echo show_tovars();
}
?>
</table>
<br>
<input type="submit" value="Добавить в корзину">
</form>
<a href="index.php"> На главную </a>

</body>
</html>
