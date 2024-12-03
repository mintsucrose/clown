<?php
   include "bdconnect.php";
if(isset($_POST["reg"])){
    $name=htmlspecialchars($_POST["name"]);
    $login=htmlspecialchars($_POST["login"]);
    $password=htmlspecialchars($_POST["password"]);
    $hash=password_hash($password,PASSWORD_BCRYPT);
    $q=mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
    $nq=mysqli_num_rows($q);
    if($nq==0){
        $hasErrors=true;
        $sql="INSERT INTO users ( name, login, hash) VALUES ('$name','$login','$hash')";
        $result=mysqli_query($link,$sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["logged"] = 1;
        $sql="SELECT max(id) FROM users";
        $result=mysqli_query($link,$sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["userid"] = $mfq[0];
        Header("Location: login.php");

    }
    else
    {echo"Логин уже занят";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="login">Логин</label>
        <input type="text" name="login" id="">
        <label for="name">Имя</label>
        <input type="text" name="name" id="">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Зарегестрироваться" name="reg"><br>
        <a href="login.php">авторизация</a><br></div>
</form>
</body>
</html>