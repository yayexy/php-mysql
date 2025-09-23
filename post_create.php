<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Création de recettes</title>
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

            if (
                !isset($_POST['title'])
                || !isset($_POST['recipe'])
                ) 
            {
                echo 'Il faut un titre et une recette pour soumettre le formulaire.';
                return;
            }

            $title = $_POST['title'];
            $recipe = $_POST['recipe'];

            if (empty(trim($_POST['title'])) || empty(trim($_POST['recipe']))) {
                ?>
                <div class="alert alert-danger mt-4" role="alert">
                    <h4 class="alert-heading text-center">Erreur de soumission</h4>
                    <p>Vous devez saisir un <strong>titre</strong> et une <strong>description</strong> pour enregistrer votre recette.</p>
                    <hr>
                    <p class="mb-0">Voici ce que vous avez envoyé :</p>
                </div>

                <div class="card border-danger shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Rappel de votre saisie</h5>
                        <p class="card-text"><b>Titre</b> : 
                            <?php echo htmlspecialchars($_POST['title']); ?> 
                        </p>
                        <p class="card-text"><b>Description</b> : 
                            <?php echo htmlspecialchars($_POST['recipe']); ?> 
                        </p>
                    </div>
                </div>
                <?php
                return;
            }

            $insertRecipe = $db->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
            $insertRecipe->execute([
                'title' => $title,
                'recipe' => $recipe,
                'is_enabled' => 1,
                'author' => $_COOKIE['LOGGED_USER'],
            ]);
        ?>
        <h1>Recette bien reçu !</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de votre recette</h5>
                <p class="card-text"><b>Titre</b> : <?php echo htmlspecialchars($_POST['title']); ?> </p>
                <p class="card-text"><b>Description</b> : <?php echo htmlspecialchars($_POST['recipe']); ?> </p>
            </div>
        </div>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>