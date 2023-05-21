<!-- nagłówek dołączany do innych stron -->
<nav class="bg-black d-flex justify-content-between align-items-center p-3">
    <a href="./index.php" class="d-inline-block"><h1>🎬</h1></a>
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
</nav>