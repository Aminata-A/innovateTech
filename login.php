<?php
    session_start();
    include_once 'connexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST['adresse_mail']) && !empty($_POST['mot_de_passe'])){

            $adresse_mail = $_POST['adresse_mail'];
            $mot_de_passe = $_POST['mot_de_passe'];

            $sql = "SELECT * FROM utilisateurs WHERE adress_mail = '$adresse_mail' AND mot_de_pass = '$mot_de_passe'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){

                $_SESSION["logged_in"] = true;
                $_SESSION["adresse_mail"] = $adresse_mail;

                header("Location: votre_page.php"); // Remplacez "votre_page.php" par l'URL de votre page après connexion
                exit();
            } else{
                $error_message = "Veuillez saisir votre nom d'utilisateur et votre mot de passe.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='utilisateur.css'>
    <title>Boîte à idées - Connexion Utilisateur</title>
</head>
<body>
    <header>
        <div>
            <img src="images/logo.png" alt="logo" width="80px">
            <a href="login.php">Connexion</a>
        </div>
    </header>

    <form action="" method="post">
        <ul>
            <li><label for="adresse_mail">Adresse Email :</label></li>
            <li><input type="email" id="adresse_mail" name="adresse_mail" required></li>

            <li><label for="mot_de_passe">Mot de Passe :</label></li>
            <li><input type="password" id="mot_de_passe" name="mot_de_passe" required></li>    
        </ul>
        <p><?php if(isset($error_message)) { echo $error_message; } ?></p>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
