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
$error = 0;
$image_file = $_FILES["image"];

if (file_exists($image_file['tmp_name']) && is_uploaded_file($image_file['tmp_name'])) {
    $image_type = exif_imagetype($image_file["tmp_name"]);
    $size = $image_file["size"];
    $cover_path = "./images/movies/".uniqid()."-".$image_file["name"];
    echo $cover_path;
    move_uploaded_file($image_file["tmp_name"], "../../$cover_path");

    if (!isset($image_file)) {
        $error++;
    }

    if (!$image_type) {
        $_SESSION["error"] = "Przesłany plik nie jest zdjęciem!";
        $error++;
    }

    if ($size > 5000000) {
        $_SESSION["error"] = "Plik jest za duży!";
        $error++;
    }

    if ($error != 0) {
        echo "<script>history.back();</script>";
        exit();
    }

    $sql = "UPDATE movies SET title = ?, description = ?, premiere_date = ?, duration = ?, genre_id = ?, cover_path = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisi", $_POST["title"], $_POST["description"], $_POST["premiere_date"], $_POST["duration"], $_POST["genre_id"], $cover_path, $_POST["movie_id"]);
    $stmt->execute();
} else {
    $sql = "UPDATE movies SET title = ?, description = ?, premiere_date = ?, duration = ?, genre_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiii", $_POST["title"], $_POST["description"], $_POST["premiere_date"], $_POST["duration"], $_POST["genre_id"], $_POST["movie_id"]);
    $stmt->execute();
}

if ($conn->affected_rows == 1){
    $_SESSION["success"] = "Prawidłowo zaktualizowano rekord";
} else {
    $_SESSION["error"] = "Nie zaktualizowano rekordu";
}

header("location: ../movies.php");