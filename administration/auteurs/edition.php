<?php
require_once('../../ressources/includes/connexion-bdd.php');
session_start();

$page_courante = "auteurs";

$entite = null;
$formulaire_soumis = !empty($_POST);
$id_present_url = isset($_GET["id"]); 
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;

if ($id_present_url) {
    $requete_brute = "SELECT * FROM auteur WHERE id = $id";
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

if ($formulaire_soumis) {
    $id = $_POST["id"];
    $nom = htmlentities($_POST["nom"]);
    $prenom = htmlentities($_POST["prenom"]);
    $lien_avatar = htmlentities($_POST["lien_avatar"]);
    $lien_twitter = htmlentities($_POST["lien_twitter"]);

    $requete_update = "
        UPDATE auteur
        SET
            nom = '$nom',
            prenom = '$prenom',
            lien_avatar = '$lien_avatar',
            lien_twitter = '$lien_twitter'
        WHERE id = '$id'
    ";

    $resultat_brut = mysqli_query($mysqli_link, $requete_update);

    if ($resultat_brut) {
        $_SESSION['message_success'] = "L'auteur a été mis à jour.";
        header("Location: ../auteurs/index.php");
        exit;
    } else {
        echo "Erreur MySQL : " . mysqli_error($mysqli_link);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once ('../ressources/includes/head.php'); ?>

    <title>Editeur auteur - Administration</title>
</head>

<body>
    <?php include_once ('../ressources/includes/menu-principal.php'); ?>
    <header style="view-transition-name: auteur-<?php echo $id; ?>"  class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-3 px-4">
            <p class="text-3xl font-bold text-gray-900">Editer</p>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 px-4">
            <div class="py-6">
                <?php if ($entite) { ?>
                    <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                        <section class="grid gap-6">
                            <input type="hidden" value="<?php echo $entite[
                                'id'
                            ]; ?>" name="id">
                            <div class="col-span-12">
                                <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
                                <input type="text" value="<?php echo $entite[
                                    'nom'
                                ]; ?>"  name="nom" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nom">
                            </div>
                            <div class="col-span-12">
                                <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
                                <input type="text" value="<?php echo $entite[
                                    'prenom'
                                ]; ?>" name="prenom" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="prenom">
                            </div>
                            <div class="col-span-12">
                                <label for="avatar" class="block text-lg font-medium text-gray-700">Lien avatar</label>
                                <input type="url" value="<?php echo $entite['lien_avatar']; ?>" name="lien_avatar" class="block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="avatar">
                                <p class="text-sm text-gray-500">
                                    Mettre l'URL de l'avatar (chemin absolu)
                                </p>
                            </div>
                            <div class="col-span-12">
                                <label for="lien_twitter" class="block text-lg font-medium text-gray-700">Lien twitter</label>
                                <input type="url" value="<?php echo $entite[
                                    'lien_twitter'
                                ]; ?>" name="lien_twitter" class="block w-full rounded-md border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-indigo-500" id="lien_twitter">
                            </div>
                            <div class="mb-3 col-md-6">
                                <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700 focus-within:bg-indigo-700">Éditer</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <!-- A compléter -->
                <?php } ?>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>
