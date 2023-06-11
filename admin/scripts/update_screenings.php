<?php
session_start();
foreach($_POST as $key => $value){
   // echo "$key: $value<br>";

if (empty($value)){
    //echo "$key<br>";
    echo "<script>history.back();</script>";
    $_SESSION["error"]="Wypełnij wszystkie pola w formularzu";
    exit();
    }
}

require_once "../../scripts/connect.php";

$subtitles = isset($_POST["is_subtitles"]) ? 1 : 0;

$sql = "UPDATE screenings SET movie_id = ?, date = ?, time = ?, price = ?, is_subtitles = ?, hall_number = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("issdiii", $_POST["movie_id"], $_POST["date"], $_POST["time"], $_POST["price"], $subtitles, $_POST["hall_number"], $_POST["screening_id"]);
$stmt->execute();

if ($conn->affected_rows == 1){
    $_SESSION["success"]="Prawidłowo zaktualizowano rekord";
} else{
    $_SESSION["error"]="Nie zaktualizowano rekordu";
}

header("location: ../screenings.php");

?>