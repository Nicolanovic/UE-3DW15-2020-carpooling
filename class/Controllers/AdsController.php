<?php

namespace App\Controllers;

use App\Services\AdsService;

class AdsController
{
    /**
     * Return the html for the create action.
     */
    public function createAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['users']) &&
            isset($_POST['cars'])) {
            // Create the ad :
            $adsService = new AdsService();
            $adId = $adsService->setAd(
                null,
                $_POST['title'],
                $_POST['description']
            );

            // Create the ad user relations :
            $isOk = true;
            if (!empty($_POST['users'])) {
                foreach ($_POST['users'] as $userId) {
                    $isOk = $adsService->setAdUser($adId, $userId);
                }
            }
            if ($adId && $isOk) {
                $html = 'Annonce créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }



        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getAds(): string
    {
        $html = '';

        // Get all ads :
        $adsService = new AdsService();
        $ads = $adsService->getAds();

        // Get html :
        foreach ($ads as $ad) {
            $userHtml = '';
            if (!empty($ad->getUser())) {
                foreach ($ad->getUser() as $user) {
                    $userHtml .= $user->getFirstname() . ' ' . $user->getLastname() . ' ' . $user->getEmail() . ' ';
                    var_dump($user->getFirstname());
                }
            }
            $carHtml = '';
            if (!empty($ad->getCar())) {
                foreach ($ad->getCar() as $car) {
                    $carHtml .= $car->getMarque() . ' ' . $car->getModele() . ' ' . $car->getPlaque() . ' ';
                }
            }
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $userHtml . ' ' .
                $carHtml . '<br />';
        }

        return $html;
    }

    /**
     * Update the ad.
     */
    public function updateAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['description'])) {
            // Update the ad :
            $adService = new AdsService();
            $isOk = $adService->setAd(
                $_POST['id'],
                $_POST['title'],
                $_POST['description']
            );
            if ($isOk) {
                $html = 'Annonce mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de votre annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the ad :
            $adService = new AdsService();
            $isOk = $adService->deleteAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de votre annonce.';
            }
        }

        return $html;
    }
}
