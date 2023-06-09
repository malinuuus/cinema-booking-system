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
$sql = "INSERT INTO `movies` (`id`,`title`, `description`, `duration`, `premiere_date`, `genre_id`) VALUES (NULL, '$_POST[title]', '$_POST[description]', '$_POST[duration]', '$_POST[premiere_date]', '$_POST[genre_id]');";
$conn->query($sql);


if( $conn->affected_rows ==1){
    //echo "Prawidłowo dodano rekord";
    $_SESSION["error"]="Prawidłowo dodano rekord";
}else{
    //echo "Nie dodano rekordu";
    $_SESSION["error"]="Nie dodano rekordu";
}

header("location: ../movies.php");

?>