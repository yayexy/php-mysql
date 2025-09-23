<?php
include_once("mysql.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo('Il faut un identifiant de recette pour la supprimer.');
    return;
}

$recipeId = (int)$_GET['id'];

$deleteStatement = $db->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteStatement->execute([
    'id' => $recipeId,
]);

header('Location: index.php');
exit;