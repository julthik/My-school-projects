<?php

class Student extends Person {

    private $group;

    public function __construct($id = 0 ,$lastname = null, $firstname = null, $group = 'RDIR') {
        parent::__construct($id, $lastname, $firstname);
        $this->group=$group;
    }
    
    public function __toString() {
        return parent::__toString()." - ".$this->group."<br/>";
    }

    public function printInfo() {
        echo "<p>". nl2br($this->__toString())."<p>";
    }

    public function getGroup() {
        return $this->group;
    }

    public function setGroup($group) {
        $this->lastname = $group;
    }
}
