<?php
$couleur_bulle_classe = "rose";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

$requete_brute = "SELECT * FROM article";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

$id = 9;
$requete = "SELECT * FROM article WHERE id = $id LIMIT 1";
$resultat = mysqli_query($mysqli_link, $requete);
$article = mysqli_fetch_assoc($resultat);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/accueil.css">
    <link rel="stylesheet" href="./ressources/css/accueil.css">
    <link rel="stylesheet" href="./ressources/css/article-css.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">
        <!-- Le header de la page article titre + petite descritipon, (DESCRIPTION A MODIFIER) -->
        <header class="flex flex-wrap place-content-between py-20">
            <h1 class="text-5xl font-semibold">Articles sur le BUT MMI</h1>
            <div class="w-1/2">
                <p class="text-lg">Entre les cours, l’université et ses IUT proposent de nombreux lieux de convivialité ou d’idéation. Divers et variés, ils permettent aux étudiants, de toute formation, de découvrir de nouveaux horizons et surtout de rencontrer les étudiants d’autres BUT.</p>
            </div>
        </header>
        <!-- Cette section c'est l'article mis en avant + la Journée portes ouvertes -->
        <section class="liste-articles pt-10">
            <hr class="border-t-1 border-gray-200 pb-20 w-full"/>
             <section class="flex flex-row pb-20 gap-10">
                <!-- L'article en premiere page  -->
                <a id="hover-card" href="article.php?id=<?php echo $article["id"];?>" class='flex flex-col w-full gap-5 image-container image-border-wrapper'>
                    <?php if ($article): ?>
                        <div class="overflow-hidden rounded-lg">
                            <img src="<?php echo $article['image']; ?>" class="w-full h-auto object-cover" />
                        </div>

                        <div class="flex flex-col place-content-between gap-20">
                            <div class="textes flex flex-col gap-5">
                                <h2 class="text-3xl"><?php echo $article['titre']; ?></h2>
                                <p class="description text-base text-gray-500"><?php echo $article['chapo']; ?></p>
                            </div>
                            <div class="flex w-full place-content-between">
                                <p>Publié le <?php echo $article ["date_creation"]; ?></p>
                                <button id="button" class="px-5 py-3 border border-gray-300 text-gray-300 rounded-full">Lire</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Article introuvable.</p>
                    <?php endif; ?>
                </a>
                <!-- Ca c'est le A de la JPO -->
                <a class="jpo-banniere" title="Ouverture dans un nouvel onglet" target="_blank" href="https://www.cyu.fr/salons-journee-portes-ouvertes">
                    <img src="ressources/images/logo-cyu-blanc.png" width="200" class="logo" alt="">

                    <section class="textes">
                        <p class="txt-petit">Journée portes ouvertes</p>
                        <p class="txt-grand">
                            27/01/<?php echo date('Y') ?>,<br />
                            de 10h à 17h
                        </p>
                        <p class="en-savoir-plus">EN SAVOIR PLUS</p>
                    </section>
                </a>
             </section>
             <!-- La section article + JPO se temrine ici  -->
              <!-- Ensuite -->
             <!-- Le hr c'est le trait horizontal, il permet de séparer les sections de la page. -->
             <hr class="border-t-1 border-gray-200 pt-20 w-full"/>

             <!-- Et la il y a tout les articles de la base de données -->
            <a href="article.php?id=<?php echo $article["id"]; ?>" class="grid grid-cols-3 gap-10 py-10" id="<?php echo $article["id"]; ?>">
            <?php while ($article = mysqli_fetch_array($resultat_brut)) {
                $date_creation = new DateTime($article["date_creation"]);?>
                <!--
                    @note
                    Nous avons passé un paramètre d'URL GET nommé "id".
                    Ainsi quand l'utilisateur va arriver sur la page "article.php",
                    elle va recevoir la valeur envoyée dans l'URL.
                    Vous pourrez récupérer la valeur en php grâce à $_GET["id"]
                -->
                    <!-- Pour midifier l'apparence (j'ai utiliser tailwind) c'est à partir d'ici, en haut c'est les parametres de la bdd -->
                     <!-- Et j'ai utiliser grid -->
                    <div id="hover-card" class="flex flex-col gap-10 justify-between image-container">

                        <div class="flex flex-col gap-5">
                            <div class="w-full aspect-square overflow-hidden rounded-lg">
                                <img class="w-full h-full object-cover" src="<?php echo $article['image']; ?>" alt="">
                            </div>
                            <h2 class='text-2xl'>
                                <?php echo $article["titre"]; ?>
                            </h2>
                            <p class='description text-base text-gray-500'>
                                <?php echo $article["chapo"]; ?>
                            </p>
                        </div>

                        <div class="flex w-full place-content-between">
                            <div class="flex items-center ">
                                <p class="date h-fit text-gray-500">Publié le <time datetime="<?php echo $date_creation->format('d/m/Y H:i:s'); ?>">
                                    <?php echo $date_creation->format('d/m/Y à H:i:s'); ?>
                                    </time>
                                </p>
                            </div>
                            <button id="button" class="px-5 py-3 border border-gray-300 rounded-full">Lire</button>
                        </div>
                        
                    </div>
                <?php } ?>
            </a>
            <!-- Ca se termine ici -->

        </section>
    </main>
    <footer>
    <?php
        require_once('./ressources/includes/footer.php');
        // mysqli_free_result($resultat_brut);
        // mysqli_close($mysqli_link);
    ?>
    </footer>
</body>

<!-- Les deux scripts javascript qui servent à l'effet hover des boutons et des images -->
<script src="./ressources/javascript/button.hover.js"></script>
<script src="./ressources/javascript/image.hover.js"></script>

</html>
