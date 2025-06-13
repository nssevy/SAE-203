<?php
require_once('../../ressources/includes/connexion-bdd.php');
session_start();

$page_courante = "articles";


$entite = null;
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;

if ($id) {
    $requete = "SELECT * FROM article WHERE id = $id";
    $resultat = mysqli_query($mysqli_link, $requete);
    $entite = mysqli_fetch_assoc($resultat);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) $_POST["id"];
    $titre = ($_POST["titre"]);
    $chapo = ($_POST["chapo"]);
    $contenu = ($_POST["contenu"]);
    $image = ($_POST["image"]);
    $lien = !empty($_POST["lien"]) ? mysqli_real_escape_string($mysqli_link, $_POST["lien"]) : null;

    $requete_update = "
        UPDATE article SET
            titre = '$titre',
            chapo = '$chapo',
            contenu = '$contenu'
            image = '$image',
            lien_yt = '$lien'
        WHERE id = $id
    ";
    $result = mysqli_query($mysqli_link, $requete_update);

if ($result) {
        $_SESSION['message_success'] = "L'article a été mis à jour.";
        header("Location:../articles/index.php");
        exit;
    } else {
        echo "Erreur MySQL : " . mysqli_error($mysqli_link);
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Éditer article</title>
    <link rel="stylesheet" href="./administration/ressources/creationadm.css">
</head>
<body>
<?php include_once('../ressources/includes/menu-principal.php'); ?>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-3 px-4">
        <h1 class="text-3xl font-bold text-gray-900">Éditer "<?php echo $entite['titre'] ?? ''; ?>"</h1>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 px-4">
        <form method="POST" class="bg-white p-6 rounded shadow">
            <input type="hidden" name="id" value="<?php echo $entite['id']; ?>" />
            <div class="mb-4">
                <label for="titre" class="block mb-1">Titre</label>
                <input id="titre" name="titre" type="text" value="<?php echo $entite['titre']; ?>" class="w-full border p-2 rounded" />
            </div>
            <div class="mb-4">
                <label for="chapo" class="block mb-1">Chapô</label>
                <textarea id="chapo" name="chapo" class="w-full border p-2 rounded"><?php echo $entite['chapo']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="contenu" class="block mb-1">Contenu</label>
                <textarea id="contenu" name="contenu" class="w-full border p-2 rounded"><?php echo $entite['contenu']; ?></textarea>
            </div>

            <div class="mb-4">
               <label for="image" class="block mb-1">image</label>
               <textarea id="image" name="image" class="w-full border p-2 rounded"><?php echo $entite['image']; ?>
               </textarea>
            </div>

            <div class="mb-4">
               <label for="image" class="block mb-1">image</label>
               <textarea id="image" name="image" class="w-full border p-2 rounded"><?php echo $entite['lien_yt']; ?>
               </textarea>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Enregistrer</button>
        </form>
    </div>
</main>
<?php include_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>
