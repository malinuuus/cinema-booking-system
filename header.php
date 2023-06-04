<!-- nagłówek dołączany do innych stron -->
<nav class="bg-black d-flex justify-content-between align-items-center p-3">
    <a href="./index.php" class="d-inline-block"><h1>🎬</h1></a>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["user_id"])) {
        require_once "scripts/connect.php";
    
        $user_id =$_SESSION["user_id"];
        $sql = "SELECT first_name, last_name FROM customers WHERE id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows >0){
            $user = $result->fetch_assoc();
            echo $user['first_name'];
            echo " ";
            echo $user['last_name'];
        }
       
    } else {
        echo "<a href='login.php'>zaloguj się</a>";
    }

 

    ?>
</nav>