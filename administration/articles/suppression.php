<?php
require_once('../../ressources/includes/connexion-bdd.php');
session_start();

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    $_SESSION['message_error'] = "ID invalide.";
    header("Location: index.php");
    exit;
}

$id = (int) $_GET["id"];
$requete = "DELETE FROM article WHERE id = $id";
$resultat = mysqli_query($mysqli_link, $requete);

if ($resultat) {
    $_SESSION['message_success'] = "L'article a bien été supprimé.";
} else {
    $_SESSION['message_error'] = "Erreur lors de la suppression : " . mysqli_error($mysqli_link);
}

header("Location: index.php");
exit;
?>
