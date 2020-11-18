<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;

class ReservationService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $id_annonce, string $id_user, string $date): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $anneeDateTime = new DateTime($date);
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($id_annonce, $id_user, $dateDateTime);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $id_annonce, $id_user, $dateDateTime);
        }

        return $isOk;
    }

    /**
     * Return all reservations.
     */
    public function getReservation(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationDTO = $dataBaseService->getReservation();
        if (!empty($reservationDTO)) {
            foreach ($reservationDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setId_annonce($reservationDTO['id_annonce']);
                $reservation->setId_user($carDTO['$id_user']);
                $date = new DateTime($reservationDTO['annee']);
                if ($date !== false) {
                    $reservation->setDate($date);
                }
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }
}
