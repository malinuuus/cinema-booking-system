<?php
session_start();
unset($_SESSION["logged"]);
$_SESSION["success"] = "Prawidłowo wylogowano!";
header("location: ../login.php");