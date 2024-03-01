<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "innovatetech";

$conn = new mysqli($server_name, $user_name, $password, $database);

if ($conn->connect_error){
    die("Echec de la connexion: " . $con->connect_error);
}
//echo "Connexion reussie"
?>