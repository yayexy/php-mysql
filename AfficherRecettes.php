<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $users = [
        [
            'full_name' => 'Mickaël Andrieu',
            'email' => 'mickael.andrieu@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Mathieu Nebra',
            'email' => 'mathieu.nebra@exemple.com',
            'age' => 34,
        ],
        [
            'full_name' => 'Laurène Castor',
            'email' => 'laurene.castor@exemple.com',
            'age' => 28,
        ],
    ];

    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => '',
            'author' => 'mickael.andrieu@exemple.com',
            'is_enabled' => false,
        ],
        [
            'title' => 'Escalope milanaise',
            'recipe' => '',
            'author' => 'mathieu.nebra@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Salade Romaine',
            'recipe' => '',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => false,
        ],
    ];

    function displayAuthor(string $authorEmail, array $users): string {
        for ($i = 0; $i < count($users); $i++) {
            $author = $users[$i];
            if ($authorEmail === $author['email']) {
                return $author['full_name'] . ' (' . $author['age'] . ' ans)';
            }
        }
        return 'Auteur inconnu';
    }

    echo '<h1>Recettes de cuisine</h1>';    

    foreach ($recipes as $recipe) {
        if ($recipe['is_enabled']) {
            echo '<h2>' . $recipe['title'] . '</h2>';
            echo '<p>' . displayAuthor($recipe['author'], $users) . '</p>';
        }
    }
    ?>
</body>
</html>
