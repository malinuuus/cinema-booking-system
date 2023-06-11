<?php
session_start();
//print_r($_POST);
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
$sql = "INSERT INTO `screenings` (`id`, `date`, `time`, `price`, `is_subtitles`, `movie_id`, `hall_number`) VALUES (NULL, '$_POST[date]', '$_POST[time]', '$_POST[price]', '$_POST[is_subtitles]', '$_POST[movie_id]', '$_POST[hall_number]');";
$conn->query($sql);


if( $conn->affected_rows ==1){
    //echo "Prawidłowo dodano rekord";
    $_SESSION["success"]="Prawidłowo dodano rekord";
}else{
    //echo "Nie dodano rekordu";
    $_SESSION["error"]="Nie dodano rekordu";
}

header("location: ../screenings.php");

?>