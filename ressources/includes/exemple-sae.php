<?php 
    // La variable i est récupérée depuis la boucle qui l'importe 
    $numSAE = 101 + $i;
    $listSAES = [
        "Auditer une communication numérique • SAÉ 101", 
        "Concevoir une recommandation de communication numérique • SAÉ 102", 
        "Produire les éléments d'une communication visuelle • SAÉ 103",
        "Produire un contenu audio et vidéo • SAÉ 104",
        "Produire un site Web • SAÉ 105",
        "Gérer un projet de communication numérique • SAÉ 106"
    ];
    $sujet = [
        "Comprendre les écosystèmes, les besoins des utilisateurs et les dispositifs de communication numérique",
        "Concevoir ou co-concevoir une réponse stratégique pertinente à une problématique complexe",
        "Créer les éléments graphiques et visuels pour une campagne de communication",
        "Exprimer un message avec les médias numériques pour informer et communiquer",
        "Développer pour le web et les médias numériques",
        "Entreprendre dans le secteur du numérique",
    ];
    $image = [
        "ressources/images/SAE101.jpg",
        "ressources/images/SAE102.png",
        "ressources/images/SAE103.png",
        "ressources/images/SAE104.jpg",
        "ressources/images/SAE105.png",
        "ressources/images/SAE106.png",
    ]
?>

<li id="hover-card" href=; id="" class="flex flex-col gap-10 justify-between image-container">
    <div class="flex flex-col gap-5">
        <div class="w-full aspect-square overflow-hidden rounded-lg ">
            <img class="w-full h-full object-cover" src="<?php echo $image[$i]; ?>" alt="">
        </div>
        <h3 class='text-2xl'>
            <?php echo $listSAES[$i]; ?>
        </h3>
        <div class="flex">
            <p class='description text-base text-gray-500 line-clamp-3'>
                <?php echo $sujet[$i]; ?>
            </p>
        </div>
    </div>
</li>