<?php

use App\Controllers\ReservationController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();
echo $controller->createReservation();
?>

<p>Création d'une réservation</p>
<form method="post" action="reservation_create.php" name ="reservationCreateForm">
    <label for="date">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="date">
    <br />
    <label for="id_annonce">ID de l'annonce :</label>
    <input type="text" name="id_annonce">
    <br />
    <label for="couleur">Id de l'utilisateur :</label>
    <input type="text" name="id_user">
    <br />
    <input type="submit" value="Réserver">
</form>