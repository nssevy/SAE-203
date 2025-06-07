<?php
$couleur_bulle_classe = "bleu";
$page_active = "equipe-de-redaction";

require_once('./ressources/includes/connexion-bdd.php');

$requete_brute = "SELECT * FROM auteur";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipe de rédaction - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    <link rel="stylesheet" href="./equipe-de-redaction.css">

</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?> 

    <main class="conteneur-principal conteneur-1280">
    <h1 class="titre">Équipe de rédaction</h1>

    <div class="conteneur-redacteurs">
        <?php while ($auteur = mysqli_fetch_array($resultat_brut)) { ?>
            <div class="redacteur">
                <img class="bulle-photo" src="<?php echo $auteur["lien_avatar"]; ?>" alt="Photo de <?php echo $auteur["prenom"]; ?>">
                <h2 class="titre_auteur"><?php echo $auteur["prenom"] . " " . $auteur["nom"]; ?></h2>
            </div>
        <?php } ?>
    </div>
</main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
