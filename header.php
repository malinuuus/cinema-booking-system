<!-- nagłówek dołączany do innych stron -->
<nav class="bg-black d-flex justify-content-between align-items-center p-3">
    <a href="./index.php" class="d-inline-block"><h1>🎬</h1></a>
    <div class="nav-item p-3 d-flex">
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["user_id"])) {
        //echo "<span>zalogowano</span>";
        require_once "scripts/connect.php";
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT first_name, last_name FROM customers WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows >0){
            $user = $result->fetch_assoc();
            echo "<span class='px-2 border-end'>$user[first_name] $user[last_name]</span>";
            echo '<a href="./scripts/logout.php" class="nav-link px-2">wyloguj</a>';
        }
    } else {
        echo "<a href='login.php' class='nav-link px-2'>zaloguj się</a>";
    }
    ?>
    </div>
</nav>