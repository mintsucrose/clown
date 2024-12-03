<?php
session_start();
include "bdconnect.php";
include "func.php";
include "validate_user.php";
if(isset($_SESSION["logged"])&& $_SESSION["logged"]=="1" && $_SESSION["id"]=="1")
header("Location: profile_admin.php");
else if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1" )
{
   ?> 
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
   </head>
   <body>
    <?
    echo "<h2> Вы вошли под именем, ".$users["name"]."</h2>";
    ?>
    <p>Ваши заказы</p>
    <table width="100%" border="2">
      <tr>
         <td>Номер заказа</td>
         <td>Дата заказа</td>
         <td>Наименование товара (id)</td>

         <td>Количество</td>
         <td>Цена за единицу</td>
         <td>Стоимость</td>
         <td>Подробнее</td>
      </tr>
      <?/*
      echo show_orders($users["id"]);*/
       ?>
    </table> 
    <a href="logout.php">Выйти из аккаунта</a><br>
    <a href="index.php">На главную</a>
    <?php
    }
    else hader("Location: index.php");
    ?>
   </body>
   </html>
