<?php
include "fonctions.php";

// Vérification si l'identifiant de l'utilisateur est passé dans le lien GET
if(isset($_GET["id_utilisateur"])) {
    $id_utilisateur = $_GET["id_utilisateur"];

    // Vérification si le formulaire a été soumis
    if(isset($_POST["submit"])) {
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $terminer = $_POST["terminer"];
        $id_utilisateur = $POST["id_utilisateur"];

        // Requête pour mettre à jour les informations de l'utilisateur
        $sql = "UPDATE utilisateur SET id_utilisateur = '$id_utilisateur', prenom='$prenom', nom='$nom', age='$age', email='$email' WHERE id_utilisateur = $id_utilisateur";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: index.php?msg=Data updated successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }

    // Récupération des informations de l'utilisateur à modifier
    $sql_select = "SELECT * FROM utilisateur WHERE id_utilisateur= $id_utilisateur";
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
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Prénom:</label>
                        <input type="text" class="form-control" name="prenom" value="<?= $row['prenom'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Nom:</label>
                        <input type="text" class="form-control" name="nom" value="<?= $row['nom'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Âge:</label>
                    <input type="number" class="form-control" name="age" value="<?= $row['age'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                </div>


                <div>
                    <button type="submit" class="btn btn-success" name="submit">Update</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
