<?php
include "bdconnect.php";
$sql = "SELECT * FROM tovars";
$result = mysqli_query ($link, $sql) or die("Query failed");
while ($row = mysqli_fetch_array($result))
{
    printf("Товар № - %s %s %s %s<br>", $row['id'],$row['name'],$row['cena'],$row['kol']);
}
mysqli_close($link);
?>