<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a car.
     */
    public function createCar(string $marque, string $modele, string $couleur, string $plaque, DateTime $annee): bool
    {
        $isOk = false;

        $data = [
            'marque' => $marque,
            'modele' => $modele,
            'couleur' => $couleur,
            'plaque' => $plaque,
            'annee' => $annee->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO cars (marque, modele, couleur, plaque, annee) VALUES (:marque, :modele, :couleur, :plaque, :annee)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Update a car.
     */
    public function updateCar(string $id, string $marque, string $modele, string $couleur, string $plaque, DateTime $annee): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'marque' => $marque,
            'modele' => $modele,
            'couleur' => $couleur,
            'plaque' => $plaque,
            'annee' => $annee->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE cars SET marque = :marque, modele = :modele, couleur = :couleur, plaque = :plaque, annee = :annee WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a comment.
     */
    public function createComment(string $id_annonce, string $firstname, string $lastname, string $email, int $phone, string $content): bool
    {
        $isOk = false;

        $data = [
            'id_annonce' => $id_annonce,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'content' => $content
        ];
        $sql = 'INSERT INTO comments (id_annonce, firstname, lastname, email, phone, content) VALUES (:id_annonce, :firstname, :lastname, :email, :phone, :content)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all comments.
     */
    public function getComments(): array
    {
        $comments = [];

        $sql = 'SELECT * FROM comments';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $comments = $results;
        }

        return $comments;
    }

    /**
     * Update a comment.
     */
    public function updateComment(string $id, string $id_annonce, string $firstname, string $lastname, string $email, int $phone, string $content): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'id_annonce' => $id_annonce,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'content' => $content,
        ];
        $sql = 'UPDATE comments SET id_annonce = :id_annonce, firstname = :firstname, lastname = :lastname, email = :email, phone = :phone, content = :content WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a comment.
     */
    public function deleteComment(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM comments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

     /**
     * Create a reservation.
     */
    public function createReservation(string $id_annonce, string $id_user, DateTime $date): bool
    {
        $isOk = false;

        $data = [
            'id_annonce' => $id_annonce,
            'id_user' => $id_user,
            'date' => $date->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO reservations (id_annonce, id_user, date) VALUES (:id_annonce, :id_user, :date)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all reservations.
     */
    public function getReservation(): array
    {
        $reservations = [];

        $sql = 'SELECT * FROM reservations';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }

        return $reservations;
    }

    /**
     * Update a reservation.
     */
    public function updateReservation(string $id, string $id_annonce, string $id_user, DateTime $date): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'id_annonce' => $id_annonce,
            'id_user' => $id_user,
            'date' => $date->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE cars SET id_annonce = :id_annonce, id_user = :id_user, date = :date WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

     /**
     * Create an ad.
     */
    public function createAd(string $title, string $description, string $id_user, string $id_car): bool
    {
        $isOk = false;

        $data = [
            'title' => $title,
            'description' => $description,
            'id_user' => $id_user,
            'id_car' => $id_car,
        ];
        $sql = 'INSERT INTO ads (title, description, id_user, id_car) VALUES (:title, :description, :id_user, :id_car)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all ads.
     */
    public function getAds(): array
    {
        $ads = [];

        $sql = 'SELECT * FROM ads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $ads = $results;
        }

        return $ads;
    }

    /**
     * Update an ad.
     */
    public function updateAd(string $id, string $title, string $description, string $id_user, string $id_car): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'id_user' => $id_user,
            'id_car' => $id_car,
        ];
        $sql = 'UPDATE ads SET id = :id, title = :title, description = :description, id_user = :id_user, id_car = :id_car;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an ad.
     */
    public function deleteAd(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM ads WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
