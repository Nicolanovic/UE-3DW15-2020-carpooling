<?php

use App\Controllers\AdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
echo $controller->updateAd();
?>

<p>Mise à jour d'une annonce</p>
<form method="post" action="cars_update.php" name ="userUpdateForm">
    <label for="title">Titre de l'annonce :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <input type="text" name="description">
    <br />
    <label for="id_user">Id de l'utilisateur :</label>
    <input type="text" name="id_user">
    <br />
    <label for="id_car">Id de la voiture :</label>
    <input type="text" name="id_car">
    <br />
    <input type="submit" value="Modifier l'annonce">
</form>