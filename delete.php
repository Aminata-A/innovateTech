<?php
include "fonctions.php";

// Vérifier si l'identifiant de l'utilisateur est passé dans l'URL
if(isset($_GET["id_utilisateur"])) {
    // Récupérer l'identifiant de l'utilisateur depuis l'URL
    $id_utilisateur = $_GET["id_utilisateur"];

    // Vérifier si l'identifiant de l'utilisateur est un entier valide
    if (!is_numeric($id_utilisateur)) {
        echo "L'identifiant de l'utilisateur n'est pas valide.";
        exit(); // Arrêter l'exécution du script si l'identifiant n'est pas valide
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $id_utilisateur = mysqli_real_escape_string($conn, $id_utilisateur);

    // Construire la requête SQL en utilisant des guillemets simples autour de la valeur de chaîne
    $sql = "DELETE FROM utilisateur WHERE id_utilisateur = '$id_utilisateur'";

    // Exécuter la requête SQL
    $result = mysqli_query($conn, $sql);

    // Vérifier si la suppression a réussi
    if ($result) {
        header("Location: index.php?msg=Data deleted successfully");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
}
?>
