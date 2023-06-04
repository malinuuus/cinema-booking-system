<?php

session_start();

unset($_SESSION["logged"]);

session_destroy();

//echo "Wylogowano";

header("Location: ../index.php?logout=1");

?>