<?php

namespace App\Services;

use App\Entities\Comment;
use DateTime;

class CommentsService
{
    /**
     * Create or update an comment.
     */
    public function setComment(?string $id, string $id_annonce, string $firstname, string $lastname, string $email, int $phone, string $content): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();

        if (empty($id)) {
            $isOk = $dataBaseService->createComment($id_annonce, $firstname, $lastname, $email, $phone, $content);
        } else {
            $isOk = $dataBaseService->updateComment($id, $id_annonce, $firstname, $lastname, $email, $phone, $content);
        }

        return $isOk;
    }

    /**
     * Return all comments.
     */
    public function getComments(): array
    {
        $comments = [];

        $dataBaseService = new DataBaseService();
        $commentsDTO = $dataBaseService->getComments();
        if (!empty($commentsDTO)) {
            foreach ($commentsDTO as $commentDTO) {
                $comment = new Comment();
                $comment->setId($commentDTO['id']);
                $comment->setId_annonce($commentDTO['id_annonce']);
                $comment->setFirstname($commentDTO['firstname']);
                $comment->setLastname($commentDTO['lastname']);
                $comment->setEmail($commentDTO['email']);
                $comment->setPhone($commentDTO['phone']);
                $comment->setContent($commentDTO['content']);

                $comments[] = $comment;
            }
        }

        return $comments;
    }

    /**
     * Delete a comment.
     */
    public function deleteComment(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteComment($id);

        return $isOk;
    }
}
