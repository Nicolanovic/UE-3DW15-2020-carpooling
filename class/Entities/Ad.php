<?php

namespace App\Entities;

class Ad
{
    private $id;
    private $title;
    private $description;
    private $user;
    private $car;

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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }


    /**
     * Get the value of user
     */
    public function getUser(): ?array
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser(array $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of car
     */
    public function getCar(): ?array
    {
        return $this->car;
    }

    /**
     * Set the value of car
     *
     * @return  self
     */
    public function setCar(array $car)
    {
        $this->car = $car;

        return $this;
    }
}
