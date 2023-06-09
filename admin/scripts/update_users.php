<?php
session_start();
print_r($_POST);
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

    $sql = "UPDATE customers SET = first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', email = '$_POST[email]', password = '$_POST[password]' WHERE customers.id = $_SESSION[user_id]";
    echo $sql;
    $conn->query($sql);



if( $conn->affected_rows ==1){
    //echo "Prawidłowo dodano rekord";
    $_SESSION["error"]="Prawidłowo zaktualizowano rekord";
}else{
    //echo "Nie dodano rekordu";
    $_SESSION["error"]="Nie zaktualizowano rekordu";
}

header("location: ../users.php");

?>