<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $recipes = [
        [
            'title' => 'Cassoulet',
            'recipe' => 'Etape 1 : des flageolets',
            'author' => 'Mickael Andrieu',
            'is_enabled' => true,
        ],
        [
            'title' => 'Escalope milanaise',
            'recipe' => 'Etape 1 : prenez une belle escalope',
            'author' => 'Mathieu Nebra',
            'is_enabled' => true,
        ],
        [
            'title' => 'Boeuf bourguignon',
            'recipe' => 'Etape 1 : prenez du boeuf',
            'author' => 'Philippe Etchebest',
            'is_enabled' => true,
        ],
        [
            'title' => 'Beignet catalan',
            'recipe' => 'Etape 1 : prenez de beaux beignets',
            'author' => 'Cyril Lignac',
            'is_enabled' => true,
        ],
        [
            'title' => 'Ratatouille',
            'recipe' => 'Etape 1 : prenez de beaux légumes',
            'author' => 'Jean-François Piège',
            'is_enabled' => false,
        ]
    ];

    foreach ($recipes as $recipe) {
        if ($recipe['is_enabled']) {
            echo '<h2>' . $recipe['title'] . '</h2>';
            echo '<p>' . $recipe['recipe'] . '</p>';
            echo '<p>' . $recipe['author'] . '</p>';
        }
    }
    ?>
</body>
</html>
