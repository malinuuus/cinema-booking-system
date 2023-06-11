<?php
session_start();
$error = 0;
foreach($_POST as $key => $value){
   // echo "$key: $value<br>";

if (empty($value)){
    //echo "$key<br>";
    echo "<script>history.back();</script>";
    $_SESSION["error"]="Wypełnij wszystkie";
    exit();
    }
}
  

    if ($error !=0){
        echo "<script> history.back();</script>";
        exit();
    }


require_once "../../scripts/connect.php";

$subtitles = isset($_POST["is_subtitles"]) ? 1 : 0;

$sql = "INSERT INTO screenings (date, time, price, is_subtitles, movie_id, hall_number) VALUES (?, ?, ?, ?, ?, ?);";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdiii", $_POST["date"], $_POST["time"], $_POST["price"], $subtitles, $_POST["movie_id"], $_POST["hall_number"]);
$stmt->execute();

if( $conn->affected_rows ==1){
    //echo "Prawidłowo dodano rekord";
    $_SESSION["success"]="Prawidłowo dodano rekord";
}else{
    //echo "Nie dodano rekordu";
    $_SESSION["error"]="Nie dodano rekordu";
}

header("location: ../screenings.php");

?>