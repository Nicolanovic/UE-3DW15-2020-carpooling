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
            isset($_POST['id_user']) &&
            isset($_POST['id_car'])) {
            // Create the ad :
            $adsService = new AdsService();
            $isOk = $adsService->setAd(
                null,
                $_POST['title'],
                $_POST['description'],
                $_POST['id_user'],
                $_POST['id_car']
            );
            if ($isOk) {
                $html = 'Annonce créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de votre annonce.';
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
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getId_user() . ' ' .
                $ad->getId_car() . '<br />';
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
            isset($_POST['description']) &&
            isset($_POST['id_user']) &&
            isset($_POST['id_car'])) {
            // Update the ad :
            $adService = new AdsService();
            $isOk = $adService->setAd(
                $_POST['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['id_user'],
                $_POST['id_car']
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