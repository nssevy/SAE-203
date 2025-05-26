<?php
$couleur_bulle_classe = "gris";
$page_active = "lieux";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lieux de vie - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/lieux.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
    // facultatif
    require_once('./ressources/includes/bulle.php');
    ?>

    <main class="conteneur-principal conteneur-1280">
        <section class="flex flex-wrap place-content-between py-10">
            <h1 class="text-5xl font-semibold">Lieux de vie</h1>
            <div class="w-1/2">
                <p class="text-lg">Entre les cours, l’université et ses IUT proposent de nombreux lieux de convivialité ou d’idéation. Divers et variés, ils permettent aux étudiants, de toute formation, de découvrir de nouveaux horizons et surtout de rencontrer les étudiants d’autres BUT.</p>
            </div>
        </section>
        <hr class="border-t-1 border-gray-200 left-1/2 -translate-x-1/2 absolute w-full"/>

        <section class="pt-20">
            <ul class="flex flex-col gap-20">
                <li class="grid grid-cols-3 gap-10 h-fit">
                    <div class="">
                        <img src="./ressources/images/BU.jpg" alt="Bibliothèque universitaire">
                    </div>
                    <section class="textes col-span-2">
                        <h2 class="titre">Bibliothèque universitaire</h2>
                        <p class="paragraphe">
                            La bibliothèque universitaire est un atout indispensable à votre réussite. Elle met à votre disposition des collections (livres, revues, ressources numériques accessibles sur place et à distance) ainsi que des postes informatiques et des espaces de travail.
                        </p>
                    </section>
                </li>
                <hr class="border-t-1 border-gray-200 w-full"/>
                <li class="grid grid-cols-3 gap-10 h-fit">
                <section class="textes col-span-2">
                        <h2 class="titre">Se restaurer</h2>
                        <p class="paragraphe">
                        Les restaurants du CROUS vous permettent de déjeuner pour un tarif social, fixé au plus à 3,30€. Pour bénéficier de ce tarif, il vous suffit de présenter votre carte d’étudiant multiservices.
                        </p>
                        <div>
                            <p class="font-semibold">Si vous êtes étudiant boursier, vous bénéficiez automatiquement lors de votre passage en caisse du tarif à 1€ pour un repas complet.</p>
                        </div>
                    </section>
                    <div class="">
                        <img src="./ressources/images/Caffet.png" alt="Cafféteria">
                    </div>
                </li>
                <hr class="border-t-1 border-gray-200 w-full"/>
                <li class="grid grid-cols-3 gap-10 h-fit">
                    <div class="">
                        <img src="./ressources/images/fablab.jpg" alt="Fablab">
                    </div>
                    <section class="textes col-span-2">
                        <h2 class="titre">Réseau des fablabs de CY Cergy Paris Université</h2>
                        <p class="paragraphe">
                        Intégré au Centre d’appui aux enseignements, le réseau des fablabs de CY Cergy Paris Université comprend le fablabs LabBoite de Cergy (Grand centre) et le Faclab de Gennevilliers (site de l’université). Ce réseau permet d’expérimenter, tester et échanger dans des lieux collaboratifs, accueillants, et ouverts à toutes et tous.
                        </p>
                    </section>
                </li>
            </ul>
        </section>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>