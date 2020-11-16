<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['marque']) &&
            isset($_POST['modele']) &&
            isset($_POST['couleur']) &&
            isset($_POST['plaque']) &&
            isset($_POST['annee'])) {
            // Create the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['marque'],
                $_POST['modele'],
                $_POST['couleur'],
                $_POST['plaque'],
                $_POST['annee']
            );
            if ($isOk) {
                $html = 'Voiture créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new carsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getMarque() . ' ' .
                $car->getModele() . ' ' .
                $car->getCouleur() . ' ' .
                $car->getPlaque() . ' ' .
                $car->getAnnee()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['marque']) &&
            isset($_POST['modele']) &&
            isset($_POST['couleur']) &&
            isset($_POST['plaque']) &&
            isset($_POST['annee'])) {
            // Update the car :
            $carsService = new carsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['marque'],
                $_POST['modele'],
                $_POST['couleur'],
                $_POST['plaque'],
                $_POST['annee']
            );
            if ($isOk) {
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $carsService = new carsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
