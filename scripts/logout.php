<?php
session_start();
unset($_SESSION["user_id"]);
$_SESSION["logout"] = 1;
header("Location: ../index.php");