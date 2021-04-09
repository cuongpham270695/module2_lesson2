<?php

namespace employee;
class Employee
{
    public $lastname;
    public $firstname;
    public $birthdate;
    public $address;
    public $position;

    public function __construct($lastname, $firstname, $birthdate, $address, $position)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->birthdate = $birthdate;
        $this->address = $address;
        $this->position = $position;
    }

    public function setLastName($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastName()
    {
        return $this->lastname;
    }

    public function setFirstName($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }

    public function setBirthDate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function getBirthDate()
    {
        return $this->birthdate;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }
}