<?php
$couleur_bulle_classe = "violet";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    die("ID d'article invalide.");
}
$requete = $mysqli_link->prepare("SELECT * FROM article WHERE id = ?");
$requete->bind_param("i", $id);
$requete->execute();
$resultat = $requete->get_result();
$entite = $resultat->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    
    <link rel="stylesheet" href="./ressources/css/accueil.css">

    <link rel="stylesheet" href="./ressources/css/article.css">

    
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
        require_once('./ressources/includes/bulle.php');
    ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">
         <?php if ($entite): ?>
            <h1 class="titre"><?php echo htmlspecialchars($entite["titre"]); ?></h1>
        <?php else: ?>
            <h1 class="titre">Article non trouvé</h1>
        <?php endif; ?>
    
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
