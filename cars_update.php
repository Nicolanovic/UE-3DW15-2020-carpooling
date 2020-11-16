<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="userUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="marque">Marque :</label>
    <input type="text" name="marque">
    <br />
    <label for="modele">Modèle :</label>
    <input type="text" name="modele">
    <br />
    <label for="couleur">Couleur :</label>
    <input type="text" name="couleur">
    <br />
    <label for="plaque">Plaque d'immatriculation :</label>
    <input type="text" name="plaque">
    <br />
    <label for="annee">Date de mise en circulation dd-mm-yyyy :</label>
    <input type="text" name="annee">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>