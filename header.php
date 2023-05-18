<!-- nagłówek dołączany do innych stron -->
<nav>
    <a href="./index.php" class="text-center"><h1>Nazwa kina</h1></a>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["user_id"])) {
        echo "<span>zalogowano</span>";
    } else {
        echo "<a href='login.php'>zaloguj się</a>";
    }
    ?>
    <a href="loginguest.php">Kontynuuj gość</a>
</nav>