<?php

namespace App\Services;

use App\Entities\Ad;

class AdsService
{
    /**
     * Create or update an ad.
     */
    public function setAd(?string $id, string $title, string $description, string $id_user, string $id_car): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createAd($id, $title, $description, $id_user, $id_car);
        } else {
            $isOk = $dataBaseService->updateAd($id, $title, $description, $id_user, $id_car);
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
                $ad->setId_user($adDTO['id_user']);
                $ad->setId_car($adDTO['id_car']);
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
}