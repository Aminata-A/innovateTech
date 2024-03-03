<?php
include "connexion.php";

// Vérification si l'identifiant de l'utilisateur est passé dans le lien GET
if(isset($_GET["id_idee"])) {
    $id_idee = $_GET["id_$id_idee"];

    // Vérification si le formulaire a été soumis
    if(isset($_POST["submit"])) {
        $titre = $_POST['titre'];
        $descriptions = $_POST['descriptions'];
        $categorie = $_POST['categorie'];
        $id_utilisateur = $_POST['id_utilisateur'];

        // Requête pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE idees SET id_idee = '$id_idee', titre='$titre', descriptions='$descriptions', categorie='$categorie', id_utilisateur='$id_utilisateur' WHERE id_idee = $id_idee";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=Data updated successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }

    // Récupération des informations de l'utilisateur à modifier
    $sql_select = "SELECT * FROM idees WHERE id_idee= $id_idee";
    $result_select = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result_select);
} else {
    echo "Identifiant de l'utilisateur non spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Modifications</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez le titre" required>
                    </div>

                    <div class="form-group">
                        <label for="descriptions">Description :</label>
                        <textarea class="form-control" id="descriptions" name="descriptions" rows="4" placeholder="Entrez la description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="categorie">Catégorie :</label>
                        <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Entrez la catégorie" required>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>
