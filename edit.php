<?php
session_start();
include "connexion.php";

// Vérification si l'identifiant de l'utilisateur est passé dans le lien GET

$id_idee = '';
$titre = '';
$descriptions = '';
$categorie = '';

if(isset($_POST["submit"])) {
    $id_idee = $_POST['id_idee'];
    $titre = $_POST['titre'];
    $descriptions = $_POST['descriptions'];
    $categorie = $_POST['categorie'];
    $id_utilisateur = $_SESSION["id_utilisateur"];

        // Vérification des champs requis
    if(empty($titre) || empty($descriptions) || empty($categorie) || empty($id_utilisateur)){
        header("location: edit.php?error=Veuillez remplir tous les champs");
        exit();
    }
    $titre = htmlspecialchars($titre);
    $descriptions = htmlspecialchars($descriptions);
    $categorie = htmlspecialchars($categorie); 


    $sql = "UPDATE idees SET titre='$titre', descriptions='$descriptions', categorie='$categorie', id_utilisateur='$id_utilisateur' WHERE id_idee ='$id_idee'";
    $result = mysqli_query($conn, $sql);
    if($conn->query($sql) === TRUE) {
        header("location: index.php?msg=Modifié avec succès !");
    } else {
        echo "Erreur lors de l'insertion : " . $conn->error;
    }
    exit(); // Arrête l'exécution du script après l'insertion

} else if (isset($_GET['id_idee'])) {
    $id_idee = $_GET['id_idee'];
    $titre = $_GET['titre'];
    $descriptions = $_GET['descriptions'];
    $categorie = $_GET['categorie'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une nouvelle idée</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
            /* Custom styles */
        
    @import url('https://fonts.cdnfonts.com/css/league-spartan');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'League Spartan', sans-serif;        
    }
    header{
        display: flex;
        justify-content: center;
        background-color: #f7f7f7;
    }
    header div{
        width: 70%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    header div a{
        text-decoration: none;
        font-weight: bold;
        color: #5ce1e6;
    }

    .container {
        margin-top: 50px;
    }

    .btn-primary {
        background-color: #5ce1e6; /* Couleur principale pour le bouton Modifier */
        border-color: #5ce1e6;
    }

    .btn-secondary {
        background-color: #ff6b6b; /* Couleur principale pour le bouton Annuler */
        border-color: #ff6b6b;
        margin-left: 10px;
    }
    </style>
</head>

<body>
    <header>
        <div>
            <img src="images/logo.png" alt="logo" width="80px">
            <a href="index.php">retours </a>
        </div>
    </header>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Modifier une nouvelle idée</h3>
            <p class="text-muted">Complétez le formulaire ci-dessous pour modifier une nouvelle idée</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="edit.php" method="POST">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" class="form-control" id="titre" value="<?php echo $titre ?>" name="titre" placeholder="Entrez le titre" required>
                    </div>

                    <div class="form-group">
                        <label for="descriptions">Description :</label>
                        <textarea class="form-control" id="descriptions" name="descriptions" rows="4" placeholder="Entrez la description" required><?php echo $descriptions ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="categorie">Catégorie :</label>
                        <input type="text" class="form-control" id="categorie" value="<?php echo $categorie ?>" name="categorie" placeholder="Entrez la catégorie" required>
                    </div>

                    <!-- Le champ pour l'ID utilisateur sera automatiquement rempli -->
                    <input type="hidden" value="<?php echo $id_idee ?>" id="id_idee" name="id_idee">
                    <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
                    <a href="index.php" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
