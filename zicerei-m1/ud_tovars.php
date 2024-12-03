<?php
/*скрипт для удаления инф из бд*/
include "bdconnect.php"; //подключение к бд
//получаем массив идентификаторов $mass, записи которых нужно удалить
if($_POST["ud_id"])
{
    $mass=$_POST["ud_id"];
    $i=0;
    while($mass[$i])
    {
        //выполнение sql-запроса к бд workers - удаление массива записей
        $sql="DELETE FROM tovars WHERE id=$mass[$i]";
        $result1 = mysqli_query($link, $sql) or die("Query failed");
        $i++;
    }
    //перенаправление пользователя на страницу uspex.php; при этом передаем параметр i=2 - удаление записей
Header("Location: uspex.php?i=2");

}?>
<h3 align="center">Список товаров</h3>
<form method="post" action="ud_tovars.php">
    <table width="100%" border="2">
        <tr>
            <td>Номер</td>
            <td>Наиминование</td>
            <td>Цена</td>
            <td>Количество</td>
            <td>Срок</td>
            <td>Редактировать</td>
            <td>Удалить</td>
        </tr>
<?

$result = mysqli_query($link, "SELECT * FROM tovars");
while($row = mysqli_fetch_array($result))
{
    $id=$row[0];
    echo "<tr>

    <td>".$row["id"]."</td>
    <td>".$row["name"]."</td>
    <td>".$row["cena"]."</td>
    <td>".$row["kol"]."</td>
    <td>".$row["srok"]."</td>
    <td>";
    ?>
    <a href="update.php?id=<? echo $id ?>">Редактировать</a></td><td>
<input type=checkbox name=ud_id[] value="<? echo $id ?>">
<? echo "</td>
</tr>";
}?>
</table>
<center><input type=submit name="ud" value=удалить></center>
</form>
<a href="index.php">На главную</a>