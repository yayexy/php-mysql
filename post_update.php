<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Modification de recettes</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    
    <div class="container vh-100">
        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
            include_once('mysql.php');
            include_once('variables.php');

            $postData = $_POST;

            if (
                !isset($postData['recipe_id'])
                || !isset($postData['title'])
                || !isset($postData['recipe'])
                ) 
            {
                echo 'Il manque des informations pour permettre l\'édition du formulaire.';
                return;
            }

            $id = $postData['recipe_id'];
            $title = $postData['title'];
            $recipe = $postData['recipe'];

            $insertRecipeStatement = $db->prepare('UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id');
            $insertRecipeStatement->execute([
                'title' => $title,
                'recipe' => $recipe,
                'id' => $id,
            ]);
            ?>
            
        <div class="alert alert-success text-center mt-4" role="alert">
            Recette modifiée avec succès !
        </div>
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title">Rappel de votre recette</h5>
                <p class="card-text"><b>Titre</b> : <?= htmlspecialchars($title) ?></p>
                <p class="card-text"><b>Description</b> : <?= htmlspecialchars($recipe) ?></p>
            </div>
        </div>

    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>