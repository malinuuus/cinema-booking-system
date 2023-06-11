<?php
session_start();
$error = 0;
foreach($_POST as $key => $value){
    
if (empty($value)){
    echo "<script>history.back();</script>";
    $_SESSION["error"]="Wypełnij wszystkie pola";
    exit();
    }
}

if ($error !=0){
    echo "<script> history.back();</script>";
    exit();
}


require_once "../../scripts/connect.php";
$sql = "INSERT INTO `movies` (`id`,`title`, `description`, `duration`, `premiere_date`, `genre_id`) VALUES (NULL, '$_POST[title]', '$_POST[description]', '$_POST[duration]', '$_POST[premiere_date]', '$_POST[genre_id]');";
$conn->query($sql);


if ($conn->affected_rows == 1){
    $_SESSION["success"] = "Prawidłowo dodano rekord";
} else {
    $_SESSION["error"] = "Nie dodano rekordu";
}

header("location: ../movies.php");

?>