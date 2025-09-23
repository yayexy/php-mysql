<?php
include_once("mysql.php");
include_once("variables.php");

$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('Il faut un identifiant de recette pour le modifier.');
    return;
}

$retrieveRecipesStatement  = $db->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipesStatement->execute([
    'id'=> $getData['id'],
]);

$recipe = $retrieveRecipesStatement->fetch(PDO::FETCH_ASSOC);
if (!$recipe) {
    echo 'Recette introuvable.';
    return;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page de modification</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="style.css">
</head>


<body class="d-flex flex-column min-vh-100">
    <?php include_once('header.php'); ?>
    
    <div class="container">
        <form action="./post_update.php" method="post" enctype="multipart/form-data">
            <h1>Mettre à jour <?php echo($recipe['title']); ?></h1>

            <label for="id" class="form-label">Identifiant de la recette</label>
            <input type="hidden" class="form-control" id="id" name="recipe_id" value="<?= htmlspecialchars($recipe['recipe_id']); ?>" readonly />

            <label for="title" class="form_label">Titre de la recette&nbsp;:</label>
            <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($recipe['title']); ?>" />
            <small id="title-help" class="form-text">Choisissez un titre percutant !</small>

            <label for="recipe">Description de la recette&nbsp;:</label>
            <textarea id="recipe" name="recipe" class="form-control" placeholder="..."><?= trim(htmlspecialchars($recipe['recipe'])); ?></textarea>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>