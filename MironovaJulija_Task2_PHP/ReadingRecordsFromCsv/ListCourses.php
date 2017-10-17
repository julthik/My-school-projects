<?php

require_once 'Classes/Course.php';
require_once 'Classes/FindData.php';

class ListCourses implements FindData{
    private $listCourses = array();
    private $listCoursesFull = array();

    public function __construct() {
        $file = fopen("DataFromTheCsv/Course.csv", "rt") or die("Error");
        for ($i = 0; $data = fgetcsv($file, 500, ";"); $i++) {
            $course = new Course($data[0],$data[1],$data[2]);
            $courseFull = new Course($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6]);
            $this->listCourses[] = $course;
            $this->listCoursesFull[] = $courseFull;
        }
    }

    public function findAll() {
        return $this->listCourses;
    }

    public function findAllFull() {
        return $this->listCoursesFull;
    }

    public function findByID($id) {
        foreach ($this->listCoursesFull as $courseFull) {
            if($courseFull->getId()==$id)
                return $courseFull;
        }
        return null;
    }
}
