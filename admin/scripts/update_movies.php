<?php
session_start();
foreach($_POST as $key => $value){
if (empty($value)){
      echo "<script>history.back();</script>";
      $_SESSION["error"]="Wypełnij wszystkie pola w formularzu";
      exit();
    }
}

require_once "../../scripts/connect.php";

$sql = "UPDATE movies SET title = ?, description = ?, premiere_date = ?, duration = ?, genre_id = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiii", $_POST["title"], $_POST["description"], $_POST["premiere_date"], $_POST["duration"], $_POST["genre_id"], $_POST["movie_id"]);
$stmt->execute();

if ($conn->affected_rows == 1){
    $_SESSION["success"]="Prawidłowo zaktualizowano rekord";
} else {
    $_SESSION["error"]="Nie zaktualizowano rekordu";
}

header("location: ../movies.php");

?>