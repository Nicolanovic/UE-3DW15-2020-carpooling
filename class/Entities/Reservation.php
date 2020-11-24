<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $id_annonce;
    private $id_user;
    private $date;
    private $users;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_annonce
     */
    public function getId_annonce()
    {
        return $this->id_annonce;
    }

    /**
     * Set the value of id_annonce
     *
     * @return  self
     */
    public function setId_annonce($id_annonce)
    {
        $this->id_annonce = $id_annonce;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): array
    {
        return $this->users;
    }

    public function setUsers(array $users)
    {
        $this->users = $users;
    }
}
