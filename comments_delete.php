<?php

use App\Controllers\CommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CommentsController();
echo $controller->deleteComment();
?>

<p>Supression d'un commentaire</p>
<form method="post" action="comments_delete.php" name ="commentDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer un commentaire">
</form>