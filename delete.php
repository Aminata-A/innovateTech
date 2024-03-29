<?php
include "connexion.php";

// Vérifier si l'identifiant de l'utilisateur est passé dans l'URL
if(isset($_GET["id_idee"])) {
    // Récupérer l'identifiant de l'utilisateur depuis l'URL
    $id_idee = $_GET["id_idee"];

    // Vérifier si l'identifiant de l'utilisateur est un entier valide
    if (!is_numeric($id_idee)) {
        echo "L'identifiant de l'utilisateur n'est pas valide.";
        exit(); // Arrêter l'exécution du script si l'identifiant n'est pas valide
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $id_idee = mysqli_real_escape_string($conn, $id_idee);

    // Construire la requête SQL en utilisant des guillemets simples autour de la valeur de chaîne
    $sql = "DELETE FROM idees WHERE id_idee = '$id_idee'";

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
    echo "ID de l'idee non ete spécifié.";
}
?>
