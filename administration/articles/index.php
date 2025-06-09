<?php
require_once('../../ressources/includes/connexion-bdd.php');
session_start();
$message_success = $_SESSION['message_success'] ?? '';
$message_error = $_SESSION['message_error'] ?? '';
unset($_SESSION['message_success'], $_SESSION['message_error']);

$page_courante = "articles";


// Récupération des articles
$requete_brute = "
    SELECT
        ar.id,
        ar.titre,
        ar.chapo,
        ar.contenu,
        ar.image,
        ar.lien_yt,
        ar.date_creation,
        ar.auteur_id,
        CONCAT(auteur.nom, ' ', auteur.prenom) AS auteur
    FROM article AS ar
    LEFT JOIN auteur ON ar.auteur_id = auteur.id
";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

$racine_URL = dirname($_SERVER['PHP_SELF']);
$URL_creation = $racine_URL . "/creation.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once("../ressources/includes/head.php"); ?>
    <title>Liste articles - Administration</title>
</head>
<body>
<?php require_once('../ressources/includes/menu-principal.php'); ?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-3 px-4 justify-between flex">
                <link rel="stylesheet" href="./ressources/creationadm.css">
        <div>
            <p class="text-3xl font-bold text-gray-900">Liste articles</p>
            <p class="text-gray-500 text-sm">Nombre d'articles : <?php echo mysqli_num_rows($resultat_brut); ?></p>
        </div>
        <a href="<?php echo $URL_creation ?>" class="rounded-md bg-slate-700 hover:bg-slate-900 text-white py-2 px-4 font-medium">Ajouter un nouvel article</a>
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
        <table class="w-full table-fixed bg-white rounded-lg overflow-hidden border-collapse shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="pl-8 py-5 text-left">ID</th>
                    <th class="pl-8 py-5 text-left">Titre</th>
                    <th class="pl-8 py-5 text-left">Chapô</th>
                    <th class="pl-8 py-5 text-left">Contenu</th>
                    <th class="pl-8 py-5 text-left">Date</th>
                    <th class="pl-8 py-5 text-left">Lien</th>
                    <th class="pl-8 py-5 text-left">Auteur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php while ($element = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC)) {
                $lien_edition = $racine_URL . "/edition.php?id=" . $element["id"];
                $date = new DateTime($element["date_creation"]);
            ?>
                <tr>
                    <td class="pl-8 p-4"><?php echo $element["id"]; ?></td>
                    <td class="pl-8 p-4"><?php echo $element["titre"]; ?></td>
                    <td class="pl-8 p-4 truncate max-w-[200px]"><?php echo $element["chapo"]; ?></td>
                    <td class="pl-8 p-4 truncate max-w-[200px]"><?php echo $element["contenu"]; ?></td>
                    <td class="pl-8 p-4"><?php echo $date->format("d/m/Y H:i"); ?></td>
                    <td class="pl-8 p-4"><?php echo $element["lien_yt"]; ?></td>
                    <td class="pl-8 p-4"><?php echo $element["auteur"] ?: "/"; ?></td>
                    <td class="pl-8 p-4">
                        <a href="<?php echo $lien_edition; ?>" class="font-bold text-blue-600 hover:text-blue-900 focus:text-blue-900">Éditer</a>
                        <a href="<?php echo $racine_URL; ?>/suppression.php?id=<?php echo $element['id']; ?>" onclick="return confirm('Supprimer cet article ?');" class='font-bold text-red-600 hover:text-red-900'>Supprimer</a>                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?php require_once("../ressources/includes/global-footer.php"); ?>
</body>
</html>