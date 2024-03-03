<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle idée</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        header {
            background-color: #c1ff72; /* Couleur principale pour l'en-tête */
            padding: 10px 0;
            display: flex;
            justify-content: space-around;
        }

        header img {
            margin-right: 10px;
        }

        header a {
            color: #000;
            text-decoration: none;
        }

        .container {
            margin-top: 50px;
        }

        .btn-primary {
            background-color: #5ce1e6; /* Couleur principale pour le bouton Ajouter */
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
            <h3>Ajouter une nouvelle idée</h3>
            <p class="text-muted">Complétez le formulaire ci-dessous pour ajouter une nouvelle idée</p>
        </div>

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

                    <!-- Le champ pour l'ID utilisateur sera automatiquement rempli -->
                    <?php


                     // Générer un ID utilisateur unique
                     function generate_user_id() {
                        // Générer un ID utilisateur unique en utilisant une combinaison de timestamp et d'un nombre aléatoire
                        return time() . mt_rand(100, 999);
                     }

                     // Utiliser la fonction pour obtenir l'ID utilisateur
                     $id_utilisateur = generate_user_id();
                     ?>


                    <input type="hidden" id="id_utilisateur" name="id_utilisateur" value="<?php echo $id_utilisateur; ?>">

                    <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                    <a href="index.php" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
