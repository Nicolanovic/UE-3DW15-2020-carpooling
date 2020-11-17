<?php

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController
{
    /**
     * Return the html for the create action.
     */
    public function createComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id_annonce']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['phone']) &&
            isset($_POST['content'])) {
            // Create the comment :
            $commentsService = new CommentsService();
 
            $isOk = $commentsService->setComment(
                null,
                $_POST['id_annonce'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['content']
            );
            if ($isOk) {
                $html = 'Commentaire créé avec succès.';
            } else {
                $html = 'Erreur lors de la création du commentaire.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getComments(): string
    {
        $html = '';

        // Get all comments :
        $commentsService = new CommentsService();
        $comments = $commentsService->getComments();

        // Get html :
        foreach ($comments as $comment) {
            $html .=
                '#' . $comment->getId() . ' ' .
                'Annonce #' . $comment->getId_annonce() . ' ' .
                $comment->getFirstname() . ' ' .
                $comment->getLastname() . ' ' .
                $comment->getEmail() . ' ' .
                $comment->getPhone() . ' ' .
                $comment->getContent() . '<br>';
        }

        return $html;
    }

    /**
     * Update the comment.
     */
    public function updateComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['id_annonce']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['phone']) &&
            isset($_POST['content'])) {
            // Update the comment :
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                $_POST['id'],
                $_POST['id_annonce'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['content']
            );
            if ($isOk) {
                $html = 'Commentaire mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour du commentaire.';
            }
        }

        return $html;
    }

    /**
     * Delete a comment.
     */
    public function deleteComment(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the comment :
            $commentsService = new CommentsService();
            $isOk = $commentsService->deleteComment($_POST['id']);
            if ($isOk) {
                $html = 'Commentaire supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression du commentaire.';
            }
        }

        return $html;
    }
}
