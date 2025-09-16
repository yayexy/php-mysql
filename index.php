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
    <!-- inclusion de l'entête du site -->
    <?php include_once('header.php'); ?>    
    
    <div class="container vh-100">

        <!-- inclusion des variables et fonctions -->
        <?php
            include_once('variables.php');
            include_once('functions.php');
        ?>

        <?php include_once('login.php'); ?>

        <?php if(isset($_COOKIE['LOGGED_USER'])): ?>
            <!-- inclusion de l'entête du site -->
            <?php include_once('header.php'); ?> 

            <h1>Vos recettes :</h1>
            <?php 
            // Afficher seulement les recettes de l'utilisateur connecté
            $userRecipes = getUserRecipes($recipes, $_COOKIE['LOGGED_USER']);
            ?>

            <?php if (!empty($userRecipes)): ?>
                <?php foreach($userRecipes as $recipe) : ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="card recipe-card h-100 mt-3 rounded-50">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?php echo $recipe['title']; ?></h5>
                                <p class="card-text text-muted flex-grow-1"><?php echo $recipe['recipe']; ?></p>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <small class="text-muted">
                                        <i class="bi bi-person-circle me-1"></i>
                                        <?php echo displayAuthor($recipe['author'], $users); ?>
                                    </small>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning">
                        Vous n'avez pas encore publié de recettes.
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
