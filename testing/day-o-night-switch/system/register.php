<?php
include "./conn.php";
?>

<?php

$firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

if ($firstName && $lastName && $email && $password) {

    // räkna ut hash på lösenordet. Pass får inte sparas i db i okrypterad text
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `hash`) VALUES ('$firstName', '$lastName', '$email', '$hash')";

    // Kör koden för att det ska fungera
    $result = $conn->query($sql);

    echo "<div class=\"alert alert-success\" role=\"alert\"><p>Användaren registrerad</p></div>";

    // Stäng ner anslutningen
    $conn->close();
    header("Location: ../index.php");

    
}  else {
    echo "<div class=\"alert alert-info\" role=\"alert\"><p>Något gick fel</p></div>";
}

?>