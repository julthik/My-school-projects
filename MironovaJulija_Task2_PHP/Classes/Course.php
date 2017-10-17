<?php

 class Course {

    private $id;
    private $name;
    private $code;
    private $eap;
    private $grade;
    private $description;
    private $lecturer;
    
    public function __construct($id=0, $name=NULL,$code=NULL,$eap=0,$grade=NULL,$description=NULL,$lecturer=NULL) {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->eap = $eap;
        $this->grade = $grade;
        $this->description = $description;
        $this->lecturer = $lecturer;
    }

    public function __toString() {
        return "Course: {$this->id}: {$this->name} {$this->code} {$this->eap} {$this->grade} {$this->description} {$this->lecturer}";
    }

    public function __toString2() {
        return "Course: {$this->id}: {$this->name} {$this->code}";
    }
  
    public function printInfo2() {
        echo "<p>". nl2br($this->__toString2())."<p>";
    }

    public function printInfo() {
        echo "<p>". nl2br($this->__toString())."<p>";
    }
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCode() {
        return $this->code;
    }

    public function getEap() {
        return $this->eap;
    }

    public function getGrade() {
        return $this->grade;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLecturer() {
        return $this->lecturer;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }
 
    public function setCode($code) {
        $this->code= $code;
    }

    public function setEap($eap) {
        $this->eap = $eap;
    }

    public function setGrade($grade) {
        $this->grade = $grade;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setLecturer($lecturer) {
        $this->lecturer = $lecturer;
    }

}