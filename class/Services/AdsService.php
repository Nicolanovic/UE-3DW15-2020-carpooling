<?php

namespace App\Services;

use App\Entities\Ad;
use App\Entities\Car;
use App\Entities\User;

class AdsService
{
    /**
     * Create or update an ad.
     */
    public function setAd(?string $id, string $title, string $description): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createAd($id, $title, $description);
        } else {
            $isOk = $dataBaseService->updateAd($id, $title, $description);
        }

        return $isOk;
    }

    /**
     * Return all ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $dataBaseService = new DataBaseService();
        $adsDTO = $dataBaseService->getAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
                $ad = new Ad();
                $ad->setId($adDTO['id']);
                $ad->setTitle($adDTO['title']);
                $ad->setDescription($adDTO['description']);

                // Get user of this ad :
                $users = $this->getAdUser($adDTO['id']);
                $ad->setUser($users);

                // Get car of this ad :
                $cars = $this->getAdCar($adDTO['id']);
                $ad->setCar($cars);

                $ads[] = $ad;
            }
        }

        return $ads;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteAd($id);

        return $isOk;
    }

    
    /**
     * Create relation bewteen an ad and its user.
     */
    public function setAdUser(string $adId, string $userId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAdUser($adId, $userId);

        return $isOk;
    }

    /**
     * Get user of given ad id.
     */
    public function getAdUser(string $adId): array
    {
        $adUser = [];

        $dataBaseService = new DataBaseService();

        // Get relation ad and user :
        $adsUserDTO = $dataBaseService->getAdUser($adId);
        if (!empty($adsUserDTO)) {
            foreach ($adsUserDTO as $adUserDTO) {
                $user = new User();
                $user->setId($adUserDTO['id']);
                $user->setFirstName($adUserDTO['firstname']);
                var_dump($adUserDTO['firstname']);
                $user->setLastname($adUserDTO['lastname']);
                $user->setEmail($adUserDTO['email']);
                $adUser[] = $user;
            }
        }

        return $adUser;
    }

    /**
     * Create relation bewteen an ad and its car.
     */
    public function setAdCar(string $adId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAdCar($adId, $carId);

        return $isOk;
    }

    /**
     * Get car of given ad id.
     */
    public function getAdCar(string $adId): array
    {
        $adCar = [];

        $dataBaseService = new DataBaseService();

        // Get relation ad and car :
        $adsCarDTO = $dataBaseService->getAdCar($adId);
        if (!empty($adsCarDTO)) {
            foreach ($adsCarDTO as $adCarDTO) {
                $car = new Car();
                $car->setId($adCarDTO['id']);
                $car->setMarque($adCarDTO['marque']);
                $car->setModele($adCarDTO['modele']);
                $car->setCouleur($adCarDTO['couleur']);
                $car->setPlaque($adCarDTO['plaque']);
                $adCar[] = $car;
            }
        }

        return $adCar;
    }
}
