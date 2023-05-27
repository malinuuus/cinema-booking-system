<?php
session_start();
$_SESSION["selectedSeats"] = $_POST["selectedSeats"];
header("location: ../buy_ticket.php");