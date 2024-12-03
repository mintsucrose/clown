<?php
session_start();
unset( $_SESSION["logged"]);
unset( $_SESSION["id"]);
session_destroy();
header("Location: index.php");
?>