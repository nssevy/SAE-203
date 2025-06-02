<?php
require_once('../../ressources/includes/connexion-bdd.php');

$page_courante = "articles";

<<<<<<< HEAD
=======
// Charger la liste des auteurs
$requete_auteurs = "SELECT id, prenom, nom FROM auteur";
$resultat_auteurs = mysqli_query($mysqli_link, $requete_auteurs);
$auteurs = mysqli_fetch_all($resultat_auteurs, MYSQLI_ASSOC);

>>>>>>> 7421e7561c58ecd9070119916b4b0d5749455765
$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (
        isset(
            $_POST["titre"],
            $_POST["chapo"],
            $_POST["lien_avatar"],
            $_POST["lien_twitter"]
        )
    ) {
        $nom = htmlentities($_POST["nom"]);
        $prenom = htmlentities($_POST["prenom"]);
        $lien_avatar = htmlentities($_POST["lien_avatar"]);
        $lien_twitter = htmlentities($_POST["lien_twitter"]);

        $requete_brute = "
            INSERT INTO article(titre, chapo, contenu, date_creation, lien, auteur)
            VALUES ('$titre', '$chapo', '$contenu', '$date_creation, $lien_yt, $id')
        ";
        $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

        if ($resultat_brut === true) {
            // Tout s'est bien passé
        } else {
            // Il y a eu un problème
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <link rel="stylesheet" href="./administration/ressources/creationadm.css">
    <title>Creation article - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <p class="text-3xl font-bold text-gray-900">Créer</p>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="prenom">
                        </div>
                        <div class="col-span-12">
                            <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="chapo"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="lien" class="block text-lg font-medium text-gray-700">Lien</label>
                            <textarea type="text" name="lien" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="lien"></textarea>
                        <p class="text-sm text-gray-500">
                                Ajouter l'URL 
                        </p>
                        </div>
                        <div class="col-span-12">
                                <label for="auteur_id" class="block text-lg font-medium text-gray-700">Auteur</label>
                                <select name="auteur_id" id="auteur_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Auteur inconnu</option>
                                <?php foreach ($auteurs as $auteur) { ?>
                                <option value="<?php echo $auteur['id']; ?>"><?php echo $auteur['prenom'] . ' ' . $auteur['nom']; ?></option>
                                <?php } ?>
                                </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus-within:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>
