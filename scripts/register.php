
<?php
/*
echo "<pre>";

  print_r($_POST);

echo "</pre>";
*/

session_start();



    foreach($_POST as $key => $value){
        if (empty($value)){
            $_SESSION["error"] = "Wypełnij wszystkie pola!";
            echo "<script>history.back();</script>";
            exit(); 
        }
    }

    $error = 0;

    if (!isset($_POST["terms"])){
		$_SESSION["error"] = "Zatwierdź regulamin!";
		$error++;
	}



    if($_POST["pass1"] != $_POST["pass2"]){
        $error = 1;
        $_SESSION["error"] = "Hasła sa różne";
    }

    if($_POST["email1"] != $_POST["email2"]){
        $error = 1;
        $_SESSION["error"] = "Adresy email są różne";
    }




    if($error != 0 ){
        echo "<script>history.back();</script>";
        exit();
    }


    require_once "./connect.php";

    $sql = "SELECT * FROM customers WHERE email = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_POST["email1"]);
    $stmt->execute();
    $result= $stmt->get_result();

    if ($result->num_rows != 0 ){
        $_SESSION["error"] = "Mail $_POST[email1] jest juz używany!";
        echo "<script>history.back();</script>";
        exit();
    }

	require_once "./connect.php";
	$stmt = $conn->prepare("INSERT INTO `customers` (`first_name`, `last_name`, `email`, `password`, `is_user`) VALUES (?, ?, ?, ?, '1' );");


    $pass = password_hash( password: '$_POST["pass1"]', algo: PASSWORD_ARGON2ID);

    //$avatar = ($_POST["gender"] == 'm') ? './jpg.man.png' : './jpg.woman.png' ;

	$stmt->bind_param('ssss', $_POST["first_name"], $_POST["last_name"], $_POST["email1"], $pass );

	$stmt->execute();

	echo $stmt->affected_rows;
  

    if ($stmt->affected_rows == 1 ){
        $_SESSION["success"] = "Dodano uzytkownika $_POST[first_name] $_POST[last_name]";

    
    }else{
        $_SESSION["error"] = "Nie udalo sie dodac rekordu ";
    }

 


