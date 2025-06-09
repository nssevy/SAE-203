<?php
$couleur_bulle_classe = "violet";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    die("ID d'article invalide.");
}

$requete = $mysqli_link->prepare("
    SELECT *
    FROM article
    JOIN auteur ON article.auteur_id = auteur.id
    WHERE article.id = ?
");

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
    <link rel="stylesheet" href="./ressources/css/header-eleve.css">

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    
    <link rel="stylesheet" href="./ressources/css/accueil.css">

    <link rel="stylesheet" href="./ressources/css/article.css">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
        require_once('./ressources/includes/bulle.php');
    ?>

    <main class="conteneur-principal conteneur-1280">
        <header class="flex flex-col pt-20 pb-50 place-self-center items-center gap-20 w-full">
            <?php if ($entite): ?>
                <h1 class="text-8xl"><?php echo htmlspecialchars($entite["titre"]); ?></h1>
            <?php else: ?>
                <h1 class="titre">Article non trouvé</h1>
            <?php endif; ?>
            <ul class="grid grid-cols-3 w-full gap-10">
                <!-- la zone identité de l'auteur -->
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">nom</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center"><?php echo htmlspecialchars($entite["nom"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">prénom</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center"><?php echo htmlspecialchars($entite["prenom"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">date</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center"><?php echo htmlspecialchars($entite["date_creation"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
            </ul>
        </header>

        <section class="flex flex-col gap-15">
            <?php if ($entite): ?>
                <h2 class="text-4xl"><?php echo htmlspecialchars($entite["chapo"]); ?></h2>
            <?php else: ?>
                <h2 class="chapo">Chapo non trouvé</h2>
            <?php endif; ?>

            <article class="px-30 text-3xl ">
                <?php if ($entite): ?>
                    <p class="contenu"><?php echo nl2br (htmlspecialchars($entite["contenu"])); ?></p>
                <?php else: ?>
                    <p class="contenu">Contenu non trouvé</p>
                <?php endif; ?>
            </article>
        </section>

        <?php if ($entite): ?>
            <img src="<?php echo htmlspecialchars($entite["image"]); ?>" alt="">
        <?php else: ?>
            <p class="contenu">Image non trouvé</p>
        <?php endif; ?>

        
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>
