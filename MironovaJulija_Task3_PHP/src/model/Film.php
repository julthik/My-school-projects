<?php
//Класс Film
class Film
{
    //Объявление свойств
    public $id;
    public $title;
    public $description;
    public $releaseYear;
    public $length;

    //Конструктор с 5 параметрами
    public function __construct($id, $title, $description, $releaseYear, $length)
    {
        //Инициализация свойств
        $this->id=$id;
        $this->title=$title;
        $this->description=$description;
        $this->releaseYear=$releaseYear;
        $this->length=$length;
    }

}


