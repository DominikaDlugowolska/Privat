
<?php

include "./conn.php";
session_start();

error_reporting(E_ALL);

$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_STRING);

if($email && $password2) {

    // Finns användaren i tabellen?
    $sql = "SELECT * FROM `users` WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<p class=\"alert alert-warning\">Användaren finns inte.</p>";
    } else {

        $rad = $result->fetch_assoc();
        $hash = $rad['hash'];

        if (password_verify($password2, $hash)) {
      
            echo "<p class=\"alert alert-success\">Du är inloggad.</p>";


            $result = $conn->query($sql);

            // Skapa en sessionvariabel
            $_SESSION['user'] = array();
            $_SESSION['user']['first'] = $rad['firstName'];
            $_SESSION['user']['last'] = $rad['lastName'];
            

            // Hoppa till sidan lista
            header("Location: ../index.php");

            } else {
            echo "<p class=\"alert alert-warning\">Lösenordet stämmer inte.</p>";
            }
        
        } 
    }
?>