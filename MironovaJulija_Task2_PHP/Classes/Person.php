<?php

abstract class Person {

    private $id;
    private $lastname;
    private $firstname;
    
    abstract public function printInfo();

    public function __construct($id = 0, $lastname = null, $firstname = null) {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
    }


    public function __toString() {
        return "{$this->id}: {$this->firstname} {$this->lastname}";
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

}
