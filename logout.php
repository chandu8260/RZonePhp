<?php
session_start();

unset($_SESSION["login_user"]);
unset($_SESSION["name"]);
header("Location:signin.php");
?>