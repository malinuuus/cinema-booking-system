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

require_once "../../scripts/connect.php";
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

    if ($error != 0){
        echo "<script>history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO movies (title, description, premiere_date, duration, genre_id, cover_path) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiis", $_POST["title"], $_POST["description"], $_POST["premiere_date"], $_POST["duration"], $_POST["genre_id"], $cover_path);
    $stmt->execute();
} else {
    $sql = "INSERT INTO movies (title, description, premiere_date, duration, genre_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $_POST["title"], $_POST["description"], $_POST["premiere_date"], $_POST["duration"], $_POST["genre_id"]);
    $stmt->execute();
}

if ($conn->affected_rows == 1){
    $_SESSION["success"] = "Prawidłowo dodano rekord";
} else {
    $_SESSION["error"] = "Nie dodano rekordu";
}

header("location: ../movies.php");