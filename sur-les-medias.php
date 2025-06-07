<?php
$couleur_bulle_classe = "rouge";
$page_active = "medias";

require_once('./ressources/includes/connexion-bdd.php');

$requete_brute = "SELECT * FROM sur_les_medias";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

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

        <?php while ($video = mysqli_fetch_array($resultat_brut)) { ?>
            <li id="<?php echo $video["id"]; ?>" class="flex flex-col">
                <a href="<?php echo htmlspecialchars ($video['link']); ?>" target="_blank">
                    <iframe class="w-full rounded-lg" height="388"
                        src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['youtube_id']); ?>"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>

                    <div class="flex flex-col justify-center py-5 gap-2">
                        <p class="uppercase text-center font-semibold text-gray-400">Vidéo</p>
                        <h2 class="text-2xl text-center font-semibold">
                            <?php echo htmlspecialchars($video["titre"]); ?>
                        </h2>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>

    </main>
    
    <footer>
        <?php require_once('./ressources/includes/footer.php'); ?>  
    </footer>
</body>

</html>