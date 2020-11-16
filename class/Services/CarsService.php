<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $marque, string $modele, string $couleur, string $plaque, string $annee): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $anneeDateTime = new DateTime($annee);
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($marque, $modele, $couleur, $plaque, $anneeDateTime);
        } else {
            $isOk = $dataBaseService->updateCar($id, $marque, $modele, $couleur, $plaque, $anneeDateTime);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setMarque($carDTO['marque']);
                $car->setModele($carDTO['modele']);
                $car->setCouleur($carDTO['couleur']);
                $car->setCouleur($carDTO['plaque']);
                $annee = new DateTime($carDTO['annee']);
                if ($annee !== false) {
                    $car->setAnnee($annee);
                }
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}
