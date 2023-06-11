<?php
session_start();
require_once "../../scripts/connect.php";

$stmt = $conn->prepare("SELECT * FROM screenings WHERE movie_id = ?");
$stmt->bind_param("i", $_POST["movie_id"]);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->num_rows;

if ($rows > 0) {
    $_SESSION["error"] = "Ten film istnieje w $rows seansach!";
    echo "<script>history.back()</script>";
    exit();
}

$sql = "DELETE FROM movies WHERE id = $_POST[movie_id]";
$conn->query($sql);
$deleteMovie = 0;
if ($conn->affected_rows != 0) {
    $deleteMovie = $_POST["movie_id"];
}else{
    $deleteMovie = 0;
}
if( $conn->affected_rows ==1){
    //echo "Prawidłowo dodano rekord";
    $_SESSION["success"]="Prawidłowo usunięto rekord";
}


header("location: ../movies.php");
?>