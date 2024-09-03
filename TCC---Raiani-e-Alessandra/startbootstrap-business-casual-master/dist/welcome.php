<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.html");
    exit;
}

echo "Bem-vindo!" . $_SESSION['nome'] . "!";

?>

<a href="logout.php">Saia Agora!</a>