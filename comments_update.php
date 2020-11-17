<?php

use App\Controllers\CommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CommentsController();
echo $controller->updateComment();
?>

<p>Mise à jour d'un commentaire</p>
<form method="post" action="comments_update.php" name ="commentUpdateForm">
    <label for="id">Id :</label>    
    <input type="text" name="id">
    <br />
    <label for="id_annonce">ID de l'annonce :</label>
    <input type="text" name="id_annonce">
    <br />
    <label for="firstname">Votre prénom :</label>
    <input type="text" name="firstname">
    <br />
    <label for="lastname">Votre nom :</label>
    <input type="text" name="lastname">
    <br />
    <label for="email">Votre email :</label>
    <input type="text" name="email">
    <br />
    <label for="phone">Votre téléphone :</label>
    <input type="text" name="phone">
    <br />
    <label for="content">Votre commentaire :</label>
    <textarea name="content"></textarea>
    <br />
    <input type="submit" value="Modifier le commentaire">
</form>