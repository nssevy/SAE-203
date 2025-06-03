<?php
require_once('../../ressources/includes/connexion-bdd.php');

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];

    $requete = "DELETE FROM auteurs WHERE id = $id";
    $resultat = mysqli_query($mysqli_link, $requete);

    if ($resultat) {
        header("Location: ../auteurs/index.php");
        exit();
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($mysqli_link);
    }
} else {
    echo "ID non spécifié.";
}
?>