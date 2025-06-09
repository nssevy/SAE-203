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

$requete_top3 = "SELECT * FROM article ORDER BY date_creation DESC LIMIT 3";
$resultat_top3 = mysqli_query($mysqli_link, $requete_top3);

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
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="./ressources/css/header-eleve.css">
    <link rel="stylesheet" href="./ressources/css/accueil.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


</head>

<body>

    <?php require_once('./ressources/includes/top-navigation.php'); ?>

    <main class="conteneur-principal conteneur-1280">

        <header class="flex flex-col gap-20 w-full h-screen justify-center">
            <?php if ($entite): ?>
                <h1 class="text-8xl/24 uppercase text-center"><?php echo htmlspecialchars($entite["titre"]); ?></h1>
            <?php else: ?>
                <h1 class="titre">Article non trouvé</h1>
            <?php endif; ?>
            <ul class="grid grid-cols-3 w-full gap-10">
                <!-- la zone identité de l'auteur -->
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">nom</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center -mt-2"><?php echo htmlspecialchars($entite["nom"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">prénom</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center -mt-2"><?php echo htmlspecialchars($entite["prenom"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
                <li class="">
                    <p class="uppercase text-gray-400 font-semibold text-xl text-center">date</p>
                    <?php if ($entite): ?>
                    <p class="uppercase font-semibold text-xl text-center -mt-2"><?php echo htmlspecialchars($entite["date_creation"]); ?></p>
                    <?php else: ?>
                        <p class="contenu">Contenu non trouvé</p>
                    <?php endif; ?>
                </li>
            </ul>
        </header>
        
        <!-- L'article -->
        <section class="flex flex-col gap-15 pb-50">
            <?php if ($entite): ?>
                <h2 class="text-3xl font-bold"><?php echo htmlspecialchars($entite["chapo"]); ?></h2>
            <?php else: ?>
                <h2 class="chapo">Chapo non trouvé</h2>
            <?php endif; ?>

            <article class="px-50 text-2xl ">
                <?php if ($entite): ?>
                    <p class="contenu"><?php echo nl2br (htmlspecialchars($entite["contenu"])); ?></p>
                <?php else: ?>
                    <p class="contenu">Contenu non trouvé</p>
                <?php endif; ?>
                <!-- L'image -->
                <?php if ($entite): ?>
                <img class="h-full w-full rounded-lg mt-20" src="<?php echo htmlspecialchars($entite["image"]); ?>" alt="">
                <?php else: ?>
                    <p class="contenu">Image non trouvé</p>
                <?php endif; ?>
            </article>
        </section>

        <hr class="border-t-1 border-gray-300 w-full"/>

        <!-- la section lire d'autres articles -->
        <section class="flex flex-col gap-10 w-full h-screen justify-center">
            <div class="py-10">
                <h2 class="text-4xl">D'autres articles</h2>
            </div>
            <div class="grid grid-cols-3 gap-10">
                <?php while ($autre_article = mysqli_fetch_assoc($resultat_top3)): ?>
                    <?php $date_creation = new DateTime($autre_article["date_creation"]); ?>
                    <a id="hover-card" href="article.php?id=<?php echo $autre_article["id"]; ?>" class="flex flex-col gap-10 justify-between image-container">
                        <div class="flex flex-col gap-5">
                            <div class="w-full aspect-square overflow-hidden rounded-lg">
                                <img class="w-full h-full object-cover" src="<?php echo $autre_article['image']; ?>" alt="">
                            </div>
                            <h2 class='text-2xl'>
                                <?php echo $autre_article["titre"]; ?>
                            </h2>
                            <p class='description text-base text-gray-500 line-clamp-3'>
                                <?php echo $autre_article["chapo"]; ?>
                            </p>
                        </div>

                        <div class="flex w-full place-content-between">
                            <div class="flex items-center">
                                <p class="date h-fit text-gray-500">Publié le 
                                    <time datetime="<?php echo $date_creation->format('Y-m-d H:i:s'); ?>">
                                        <?php echo $date_creation->format('d/m/Y à H:i'); ?>
                                    </time>
                                </p>
                            </div>
                            <button id="button" class="px-5 py-3 border border-gray-300 text-gray-300 rounded-full">Lire</button>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </section>

    </main>
    <footer class="pb-20">
        <?php require_once('./ressources/includes/footer.php'); ?>
    </footer>
    <!-- Le boutton en bas de l'ecran pour revenir en arrière -->
    <div class="fixed bottom-0 left-0 w-full flex justify-center z-50 pb-4">
        <button class="bg-gray-900 text-gray-50 rounded-full px-5 py-3 transform transition-transform duration-200 hover:scale-103 "><a href="">Retour</a></button>
    </div>
</body>

<script src="./ressources/javascript/button.hover.js"></script>
<script src="./ressources/javascript/image.hover.js"></script>

</html>
