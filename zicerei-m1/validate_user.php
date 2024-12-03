<?php
session_start();
include "bdconnect.php";
$id=-1;
if (isset($_SESSION["logged"]) && $_SESSION["logged"]=="1"){
    $id=$_SESSION["userid"];
    $users_query=mysqli_query($link, "SELECT * FROM users WHERE id='".$id."'");
$users=mysqli_fetch_array($users_query);
}
?>