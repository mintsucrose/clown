<?php
include "bdconnect.php";
$name=$_POST["name"];
$cena=$_POST["cena"];
$srok=$_POST["srok"];
$kol=$_POST["kol"];
$id_cat=$_POST["category"];

if( is_uploaded_file($_FILES["filename"]["tmp_name"]))
{
    $img=$_FILES['filename']['name'];
    move_uploaded_file
    (
        $_FILES["filename"]["tmp_name"],
        __DIR__ . DIRECTORY_SEPARATOR . "images".
        DIRECTORY_SEPARATOR.$_FILES["filename"]["name"]
    );
} else {
    echo("Ошибка загрузки файла");
}

$sql = "INSERT INTO tovars (name, id_cat, cena, kol, srok, img) 
VALUES ('$name','$id_cat','$cena', '$kol', '$srok', '$img')";
echo $sql;
$result = mysqli_query($link, $sql) or die("Query failed");

Header("Location: uspex.php?i=1");
?>