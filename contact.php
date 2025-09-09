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
        <form action="./submit_contact.php" method="GET">
            <h1>Contactez nous</h1>
            <label for="user_email">Email&nbsp;:</label>
            <input type="email" id="email" name="user_email" class="form-control" />
            <small>Nous ne revendrons pas votre email.</small>

            <label for="user_message">Votre message&nbsp;:</label>
            <textarea id="message" name="user_message" class="form-control" placeholder="Exprimez vous"></textarea>

            <button type="submit" class="btn">Envoyer</button>
        </form>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>
</html>