<?php
$couleur_bulle_classe = "vert";
$page_active = "apropos";

require_once('./ressources/includes/connexion-bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos - SAÉ 203</title>

    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="./ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="./ressources/css/header-eleve.css">


    <link rel="stylesheet" href="./ressources/css/a-propos.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">

        <header class="flex place-content-between py-20">
            <h1 class="text-5xl font-semibold">A propos du MMI</h1>
            <div class="w-1/2">
                <p class="text-lg">Avant de devenir le BUT MMI, la formation a connu plusieurs évolutions majeures. Ce diplôme innovant formait des profils polyvalents, mêlant communication, design et technologies numériques, en réponse aux besoins croissants du secteur.</p>
            </div>
        </header>

        <hr class="border-t-1 border-gray-200 pb-20 w-full"/>


        <section class="flex flex-col px-50 gap-50">
            <section id="presentation" class="flex flex-col gap-10 text-xl">
                <h2 class="text gray-950 text-4xl">Presentation</h2>
                <p>
                    Le BUT métiers du multimédia et de l'internet (MMI) remplace le DUT MMI à partir de la rentrée 2021, auparavant appelé DUT SRC (services et réseaux de communication) jusqu'en mai 2013, qui était lancé à la rentrée universitaire 1994 par les IUT de Vélizy, Marne-la-Vallée, Saint-Raphaël et Verdun. Ce BUT offre une alternative aux anciens diplômes Bac+3, tels que la licence professionnelle en activités et techniques de communication et la licence professionnelle en systèmes informatiques et logiciels.
                </p>
                <p class="">
                    Lorsque cette formation était proposée sous la forme d'un Diplôme Universitaire Technologique (DUT), elle se déroulait sur deux années (1 800 heures). En théorie, elle est accessible à tous les bacheliers, quelle que soit leur série. En moyenne, il y a de 30 à 35 heures de cours par semaine. Cette formation se divise en trois grands pôles, auxquels il faut ajouter le projet tutoré (300 heures) et les stages (420 heures). Les trois grands axes sont les suivants :
                </p>

                <ul class="liste-axes">
                    <li>La culture contemporaine et langues étrangères (500 heures) </li>
                    <li>La culture scientifique et technique (700 heures) </li>
                    <li>La culture communicationnelle (600 heures)</li>
                </ul>

                <div class="img-quebec">
                    <img src="ressources/images/SAE.jpg" alt="SAE">
                </div>

                <div>
                    <p class="paragraphe">
                        A CY Cergy Paris Université, il est donné la possibilité aux étudiants de passer un semestre au Québec à l'Université du Québec à Chicoutimi (UQAC) dans une formation dont le contenu est proche de celui proposé à l'IUT. Il est également possible d'effectuer ce semestre après avoir été diplômé. <span class="texte-gras">Attention : les cours sont dispensés en langue française.</span>
                    </p>
                </div>

            </section>

            <section id="presentation" class="flex flex-col gap-10 text-xl">
                <h2 class="text gray-950 text-4xl" id="sae">Situation d'Apprentissage et d'Évaluation</h2>

                <p class="">
                Dans l’optique de préparer au mieux les étudiants à leur future vie professionnelle, les étudiants sont regroupés en agences de communication de 3 à 7 personnes dans des projets appelés "SAÉ" ou Situation d'Apprentissage et d'Évaluation. Ces agences ont pour but d’encourager le travail d’équipe dans un cadre reprenant l'environnement du travail en entreprise.
                </p>
                <p class="">
                La situation d'apprentissage et d'évaluation ou simplement SAÉ est la situation didactique que privilégie, au Québec, le Ministère de l'Éducation, Enseignement supérieur et Recherche (MEESR) par le biais du Programme de formation de l'école québécoise (PFEQ). Une SAÉ se définit comme un ensemble constitué d’une ou plusieurs tâches à réaliser par l’élève en vue d’atteindre le but fixé. Elle permet : à l’élève, de développer et d’exercer une ou plusieurs compétences disciplinaires et transversales; à l’enseignant, d’assurer le suivi du développement des compétences dans une perspective d’aide à l’apprentissage. Elle est donc centrée sur l'élève et préconise une approche constructiviste ou socioconstructiviste à l'école.
                </p>
                <p class="">
                Les SAÉ sont une nouveauté des diplômes BUT, <span class="font-bold">elles visent à remplacer les Devoirs Sur Table et les notes à terme,</span> en proposant une approche plus "ingénieure" de la scolarité avec des étudiants qui apprennent à résoudre des problèmes et non plus apprendre par cœur leurs cours.
                </p>
            </section>

        </section>

        <section class="pt-50">
            <h2 id="exemple-sae" class="text gray-950 text-4xl">Exemples de SAÉ</h2>
            <ul class="grid grid-cols-3 gap-10 py-10">
                <?php for ($i = 0; $i < 6; $i++) {
                    // On profite de le fonction "include" pour déporter notre code dans un autre fichier
                    // Et le structurer
                    include('./ressources/includes/exemple-sae.php');
                } ?>
            </ul>

        </section>
    </main>

    <footer class="pb-20">
        <?php require_once('./ressources/includes/footer.php'); ?>
    </footer>

    <!-- Le truc en bas la  -->
    <div class="fixed bottom-0 left-0 w-full flex justify-center z-50 pb-4 ">

        <div class="flex gap-5 text-gray-50 bg-gray-800/50 backdrop-blur-3xl rounded-full px-5 py-3 ">

            <button class=" transform transition-transform duration-200 hover:scale-103 "><a href="./a-propos.php#presentation">Présentation</a></button>

            <hr class="h-full border-r-2 border-gray-50/50 rounded-full">

            <button class="transform transition-transform duration-200 hover:scale-103 "><a href="./a-propos.php#sae">SAÉ</a></button>

            <hr class="h-full border-r-2 border-gray-50/50 rounded-full">


            <button class=" transform transition-transform duration-200 hover:scale-103 "><a href="./a-propos.php#exemple-sae">Exemples de SAÉ</a></button>
        </div>

    </div>

</body>

<script src="./ressources/javascript/image.hover.js"></script>

</html>
