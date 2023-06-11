<?php
session_start();
print_r($_POST);
foreach($_POST as $key => $value){
if (empty($value)){
        echo "<script>history.back();</script>";
        $_SESSION["error"]="Wypełnij wszystkie pola w formularzu";
        exit();
    }
}

require_once "../../scripts/connect.php";

$sql = "UPDATE customers SET first_name = ?, last_name = ?, email = ? WHERE id = ?";
$stmt =  $conn->prepare($sql);
$stmt->bind_param('sssi', $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["id"]);
$stmt->execute();

if ($conn->affected_rows == 1){
    $_SESSION["success"] = "Prawidłowo zaktualizowano rekord";
} else {
    $_SESSION["error"] = "Nie zaktualizowano rekordu";
}

header("location: ../users.php");

?>