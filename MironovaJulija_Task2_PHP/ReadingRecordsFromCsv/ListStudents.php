<?php

require_once 'Classes/Student.php';

class ListStudents{
    private $listStudents = array();

    public function __construct() {
        $file = fopen("DataFromTheCsv/Students.csv", "rt") or die("Error");
        for ($i = 0; $data = fgetcsv($file, 100, ";"); $i++) {
            $student = new Student($data[0], $data[1], $data[2], $data[3]);
            $this->listStudents[] = $student;
        }
    }

    public function findAll() {
        return $this->listStudents;
    }

    public function findByID($id) {
        foreach ($this->listStudents as $student) {
            if($student->getId()==$id)
                return $student;
        }
        return null;
    }
}