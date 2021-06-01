<?php
session_start();

// Logga ut genom att döda session variablarna
session_destroy();

// Hoppa till sidan lista
header("Location: ../index.php");
?>