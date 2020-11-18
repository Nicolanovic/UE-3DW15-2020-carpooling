<?php

use App\Controllers\reservationController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationController();
echo $controller->updateReservation();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservation_update.php" name ="reservationUpdateForm">
    <label for="id">Id de la réservation :</label>
    <input type="text" name="id">
    <br />
    <label for="date">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="date">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>