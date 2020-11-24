<?php

use App\Controllers\AdsController;
use App\Services\UsersService;
use App\Services\CarsService;

require __DIR__ . '/vendor/autoload.php';

$controller = new AdsController();
echo $controller->createAd();

$usersService = new UsersService();
$users = $usersService->getUsers();

$carsService = new CarsService();
$cars = $carsService->getCars();

?>

<p>Création d'une annonce</p>
<form method="post" action="ads_create.php" name="adCreateForm">
    <label for="title">Titre de l'annonce :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <input type="text" name="description">
    <br />
    <label for="users">Utilisateur :</label>
    <?php foreach ($users as $user): ?>
    <?php $userName = $user->getFirstname() . ' ' . $user->getLastname() . ' ' . $user->getEmail(); ?>
    <input type="checkbox" name="user[]"
        value="<?php echo $user->getId(); ?>"><?php echo $userName; ?>
    <br />
    <?php endforeach; ?>
    <br />
    <label for="cars">Voiture :</label>
    <?php foreach ($cars as $car): ?>
    <?php $carMarque = $car->getMarque() . ' ' . $car->getModele() . ' ' . $car->getPlaque() . ' ' . $car->getCouleur(); ?>
    <input type="checkbox" name="car[]"
        value="<?php echo $car->getId(); ?>"><?php echo $carMarque; ?>
    <br />
    <?php endforeach; ?>
    <br />
    <input type="submit" value="Créer une annonce">
</form>