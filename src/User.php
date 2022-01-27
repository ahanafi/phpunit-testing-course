<?php

class User
{
    public $firstName;
    public $lastName;

    public function getFullName(): string
    {
        return trim($this->firstName . " " . $this->lastName);
    }
}