<?php

namespace App\Controllers;

use App\Services\ReservationService;

class ReservationController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id_annonce']) &&
            isset($_POST['id_user']) &&
            isset($_POST['date'])) {
            // Create the reservation :
            $reservationService = new ReservationService();
            $isOk = $reservationService->setReservation(
                null,
                $_POST['id_annonce'],
                $_POST['id_user'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Réservation demandée avec succès.';
            } else {
                $html = 'Erreur lors de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservation(): string
    {
        $html = '';

        // Get all reservations :
        $reservationService = new reservationService();
        $reservations = $reservationService->getReservation();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getId_annonce() . ' ' .
                $reservation->getId_user() . ' ' .
                $reservation->getDate()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['id_annonce']) &&
            isset($_POST['id_user']) &&
            isset($_POST['date'])) {
            // Update the reservation :
            $reservationService = new reservationService();
            $isOk = $reservationService->setReservation(
                $_POST['id'],
                $_POST['id_annonce'],
                $_POST['id_user'],
                $_POST['date']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de votre réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationService = new reservationService();
            $isOk = $reservationService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de votre réservation.';
            }
        }

        return $html;
    }
}
