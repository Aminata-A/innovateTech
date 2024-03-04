<?php
    include_once("connexion.php");

    if(isset($_POST['submit'])){
        // Récupération des données du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse_mail = $_POST['adresse_mail'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $mot_de_passe = $_POST['mot_de_passe'];
        $date_naissance = $_POST['date_naissance'];
        $lieu_naissance = $_POST['lieu_naissance'];
        $poste = $_POST['poste'];

        // Vérification des champs requis
        if(empty($prenom) || empty($nom) || empty($adresse_mail) || empty($telephone) || empty($adresse) || empty($mot_de_passe) || empty($date_naissance) || empty($lieu_naissance) || empty($poste)){
            header("location: login.php?error=Veuillez remplir tous les champs");
            exit();
        }

        // Requête SQL pour l'insertion des données
        $sql = "INSERT INTO utilisateurs (prenom, nom, adress_mail, telephone, adresse, mot_de_pass, date_naissance, lieu_naissance, poste)
        VALUES ('$prenom', '$nom', '$adresse_mail', '$telephone', '$adresse', '$mot_de_passe', '$date_naissance', '$lieu_naissance', '$poste')";

        if($conn->query($sql) === TRUE) {
            echo "Enregistrement inséré avec succès.";
        } else {
            echo "Erreur lors de l'insertion : " . $conn->error;
        }
        exit(); // Arrête l'exécution du script après l'insertion
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='utilisateur.css'>
    <title>Boîte à idées - Inscription Utilisateur</title>
</head>
<body>
    <header>
        <div>
            <img src="images/logo.png" alt="logo" width="80px">
            <a href="login.php">Connexion</a>
        </div>
    </header>
    <div class="body">
        <h1>Bienvenue dans notre boîte à idées</h1>
        <p>Si vous n'avez pas encore de compte, veuillez vous inscrire.</p>

        <form action="" method="post">
            <ul>
                <div>
                <li><label for="prenom">Prénom :</label></li>
                <li><input type="text" id="prenom" name="prenom" required class = "input" ></li>

                <li><label for="nom">Nom :</label></li>
                <li><input type="text" id="nom" name="nom" required class = "input"></li>

                <li><label for="adresse_mail">Adresse Email :</label></li>
                <li><input type="email" id="adresse_mail" name="adresse_mail" required class = "input"></li>

                <li><label for="telephone">Téléphone :</label></li>
                <li><input type="tel" id="telephone" name="telephone" required class = "input"></li>

                <li><label for="adresse">Adresse :</label></li>
                <li><input type="text" id="adresse" name="adresse" required class = "input"></li>

                </div>
                <div>

                <li><label for="mot_de_passe">Mot de Passe :</label></li>
                <li><input type="password" id="mot_de_passe" name="mot_de_passe" required class = "input"></li>

                <li><label for="date_naissance">Date de Naissance :</label></li>
                <li><input type="date" id="date_naissance" name="date_naissance" required class = "input"></li>

                <li><label for="lieu_naissance">Lieu de Naissance :</label></li>
                <li><input type="text" id="lieu_naissance" name="lieu_naissance" required class = "input"></li>

                <li><label for="poste">Poste :</label></li>
                <li><input type="text" id="poste" name="poste" required class = "input"></li>

                <li><input type="submit" name="submit" value="S'inscrire" class="button"></li>
                </div>
            </ul>
        </form>
    </div>
</body>
</html>
