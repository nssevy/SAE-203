<?php
require_once('../../ressources/includes/connexion-bdd.php');
session_start();
$message_success = "";
$message_error = "";

$page_courante = "articles";


$requete_auteurs = "SELECT id, prenom, nom FROM auteur";
$resultat_auteurs = mysqli_query($mysqli_link, $requete_auteurs);
$auteurs = mysqli_fetch_all($resultat_auteurs, MYSQLI_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = htmlentities($_POST["titre"]);
    $chapo = htmlentities($_POST["chapo"]);
    $lien = htmlentities($_POST["lien"]);
    $auteur_id = (int) $_POST["auteur_id"];
    $date_creation = date('Y-m-d H:i:s');

    $requete = "
        INSERT INTO article (titre, chapo, lien_yt, date_creation, auteur_id)
        VALUES ('$titre', '$chapo', '$lien', '$date_creation', $auteur_id)
    ";
    $resultat = mysqli_query($mysqli_link, $requete);
    if ($resultat) {
    $_SESSION['message_success'] = "Article créé avec succès.";
    header("Location: ../articles/index.php");
    exit;
} else {
    $message_error = "Erreur lors de la création : " . mysqli_error($mysqli_link);
}

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Créer un article</title>
</head>
<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-3 px-4">
        <h1 class="text-3xl font-bold text-gray-900">Créer un article</h1>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl py-6 px-4">
         <?php if (!empty($message_success)) : ?>
    <div class="alert-success"><?php echo $message_success; ?></div>
<?php endif; ?>

<?php if (!empty($message_error)) : ?>
    <div class="alert-error"><?php echo $message_error; ?></div>
<?php endif; ?>
        <form method="POST" class="bg-white p-6 rounded shadow">
            <div class="mb-4">
                <label class="block mb-1">Titre</label>
                <input type="text" name="titre" class="w-full border p-2 rounded" />
            </div>
            <div class="mb-4">
                <label class="block mb-1">Chapô</label>
                <textarea name="chapo" class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
               <label class="block mb-1">Contenu</label>
               <textarea name="contenu" class="w-full border p-2 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Lien YouTube</label>
                <input type="text" name="lien" class="w-full border p-2 rounded" />
            </div>
            <div class="mb-4">
                <label class="block mb-1">Auteur</label>
                <select name="auteur_id" class="w-full border p-2 rounded">
                    <option value="">-- Sélectionner --</option>
                    <?php foreach ($auteurs as $auteur): ?>
                        <option value="<?php echo $auteur['id']; ?>">
                            <?php echo $auteur['prenom'] . ' ' . $auteur['nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Créer</button>
        </form>
    </div>
</main>
<?php include_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>
