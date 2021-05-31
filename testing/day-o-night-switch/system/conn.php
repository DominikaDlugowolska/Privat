<?php
$host = "localhost";
$user = "artgallery";
$pass = "jypI8h29tySTg7B5";
$db = "artgallery";

// Logga in på mysql-server och välj databas
$conn = new mysqli($host, $user, $pass, $db);

// Gick det att ansluta?
if ($conn->connect_error) {
    die("Kunde inte ansluta: " . $conn->connect_error);
} else {
    //echo "<p>Det gick bra att ansluta</p>";
}
?>