            <?php
require_once('./ressources/includes/connexion-bdd.php');

$couleur_bulle_classe = "rouge";
$page_active = "medias";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sur les médias - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="./ressources/css/sur-les-medias.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <main class="conteneur-principal conteneur-1280">
        <section class="flex flex-wrap place-content-between py-10">
            <h1 class="text-5xl font-semibold">Revue média</h1>
            <div class="w-1/2">
                <p class="text-lg">Les actualités et les évènements important du BUT et de l'IUT CY Paris Université dans les médias</p>
            </div>
        </section>
        <hr class="border-t-1 border-gray-200 left-1/2 -translate-x-1/2 absolute w-full"/>
        <ul class="grid grid-cols-3 gap-5 pt-20">
            <li class="w-full rounded-xl">
                <iframe class="w-full" height="388" src="https://www.youtube.com/embed/oiEbQF7qfBU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="flex flex-col justify-center py-5 gap-2">
                    <p class="uppercase text-center font-semibold text-gray-400">video</p>
                    <h2 class="text-2xl text-center font-semibold">La nouvelle réforme</h2>
                </div>
            </li>
            <li class="w-full">
                <iframe class="w-full" height="388" src="https://www.youtube.com/embed/SyjF4h2Zb7Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="flex flex-col justify-center py-5 gap-2">
                    <p class="uppercase text-center font-semibold text-gray-400">video</p>
                    <h2 class="text-2xl text-center font-semibold">Pourquoi étudier à l'IUT CYU ?</h2>
                </div>
            </li>
            <li class="w-full">
                <iframe class="w-full" height="388" src="https://www.youtube.com/embed/t72pdxpNjyc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="flex flex-col justify-center py-5 gap-2">
                    <p class="uppercase text-center font-semibold text-gray-400">video</p>
                    <h2 class="text-2xl text-center font-semibold">Job interview en anglais au département MMI</h2>
                </div>
            </li>
            <li class="w-full rounded-xl">
                <iframe class="w-full" height="388" src="https://www.youtube.com/embed/xD4wshE0hEg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="flex flex-col justify-center py-5 gap-2">
                    <p class="uppercase text-center font-semibold text-gray-400">video</p>
                    <h2 class="text-2xl text-center font-semibold">L'importance de l'IUT dans les études supérieures</h2>
                </div>
            </li>
        </ul>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>