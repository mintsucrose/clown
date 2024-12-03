<?php
session_start();
include("bdconnect.php");
if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1")

Header("Location: profile.php");
if (isset($_POST["auth"])){
    $login=$_POST["login"];
    $password=$_POST["password"];
    $dataSent=$_POST["dataSent"];
    $hasErrors=false;
    if($dataSent==1){
        $q=mysqli_query($link, "SELECT * FROM users WHERE login='".$login."'");
        $nq=mysqli_num_rows($q);
        if($nq==0){
            $hasErrors=true;
        }elseif($nq==1){
            $mfq=mysqli_fetch_array($q);
            $hash=$mfq["hash"];
            if(password_verify($password, $hash)){
                $_SESSION["logged"] = 1;
                $_SESSION["userid"] = $mfq[0];
                Header("Location: profile.php");
            }
            
        }
        else $hasErrors=true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход на сайт</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="login" placeholder="Логин"/>
        <input type="password" name="password" placeholder="пароль"/>
        <input type="hidden" name="dataSent" value="1"/>
        <input type="submit" name="auth" value="Войти"/>
    </form>
    <?php
    if($hasErrors){
        echo "Вы ввели неправильный логин или пароль";
    }
    ?>
    <a href="registr.php">Регистрация</a><br>
    <a href="index.php">На главную</a>
</body>
</html>