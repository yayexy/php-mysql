<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    <link rel="stylesheet" href="style.css">
</head>


<body class="d-flex flex-column min-vh-100">
    <?php include_once('header.php'); ?>
    
    <div class="container">
        <form action="./post_create.php" method="post" enctype="multipart/form-data">
            <h1>Ajoutez une recette</h1>
            <label for="title" class="form_label">Titre de la recette&nbsp;:</label>
            <input type="text" id="title" name="title" class="form-control" />
            <small id="title-help" class="form-text">Choisissez un titre percutant !</small>

            <label for="recipe">Description de la recette&nbsp;:</label>
            <textarea id="recipe" name="recipe" class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits."></textarea>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>