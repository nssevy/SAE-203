<?php 
    // La variable i est récupérée depuis la boucle qui l'importe 
    $numSAE = 101 + $i;
    $listSAES = [
        "Auditer une communication numérique", 
        "Concevoir une recommandation de communication numérique", 
        "Produire les éléments d’une communication visuelle",
        "Produire un contenu audio et vidéo",
        "Produire un site Web",
        "Gérer un projet de communication numérique"
    ];
    $sujet = [
        "Reportage vidéo sur un sujet libre",
        "Keeqaid",
        "Jolagreen",
        "sherrif",
        "leto",
        "L2b gang fily"
    ];
    $image = [
        "ressources/images/SAE.jpg",
        "ressources/images/a-propos/Letter-1.svg",
        // ajoutez encore d'autres images
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
        <p class='description text-base text-gray-500 line-clamp-3'>
            <?php echo $sujet[$i]; ?>
        </p>
    </div>
</li>