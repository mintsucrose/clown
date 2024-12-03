<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Склад товаров->Корзина товаров</title>
</head>
<body>
<h1>Вы добавили в корзину</h1>
<form action="" method="post" name="frt" >
<table align="center" border="1">
<tr>
<td>Идентификатор товара</td>
<td>Наименование</td>
<td>Количество</td>
<td>Цена за 1 шт.</td>
<td>Общая стоимость</td>

</tr>
<?
include "bdconnect.php";

if(isset($_POST["id"]))
{
$mass =$_POST["id"];
$name=$_POST["name"];
$cena=$_POST["cena"];
}
$i=0;
$quantity=0;
while($mass [$i])
{
    $sql="SELECT * FROM tovars WHERE id=$mass[$i]";
    $result = mysqli_query($link, $sql) or die("Query failed");
    $row=mysqli_fetch_array($result);
}
if(isset ($_POST["zak"]) && isset($_POST["id"]))
{
$mass=$_POST["id"];
$name=$_POST["name"];
$kol=$_POST["kol"];
$cena=$_POST["cena"];
$i=0;
$id_user=1;
$data=date("Y-m-d H:i:s");
$id_order=strtotime($data);
while($mass[$i])
{
    $sql="INSERT INTO orders (id_order,id_user,id_tovar, quantity, cost, datatime) VALUE
    S ('$id_order','$id_user','$mass[$i]', '$kol[$i]', '$cena[$i]', '$data' )";
    $result1 = mysqli_query($link, $sql) or die("Query failed");
    $i++;
    }
    Header("Location: uspex.php?i=4");
}?>
<?
include "bdconnect.php";
if(isset($_POST["id"]))
{
$mass =$_POST["id"];
}
$i=0;
$quantity=0;
while($mass[$i])
{
$sql="SELECT * FROM tovars WHERE id=$mass[$i]";
$result = mysqli_query($link, $sql) or die("Query failed");
$row=mysqli_fetch_array($result);
?>
<tr>
<td> <?php echo $mass[$i] ?></td>
<td><input type="text" name="name[]" value=" <?php echo $row["name"] ?>"></td>
<td> <input type="number" name="kol[]" id="" value="1"></td>
<td> <input type="text" name="cena[]" value="<?php echo $row["cena"] ?>"> </td>
<td><span class="stoim"> <?php echo $stoim=1*$row["cena"] ?></span></td>
<?
$i++;
$quantity+=$stoim;
}
?>
</table>
Общая стоимость заказа <? echo $quantity ?>
<input type="submit" name="zak" value="Оформить заказ">
</form>
</body>
</html>