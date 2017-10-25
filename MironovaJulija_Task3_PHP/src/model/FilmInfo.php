<?php
//Класс-потомок FilmInfo от класса-родителя Film
class FilmInfo extends Film
{
    //Объявление свойств
    public $actors=array();
    public $categories=array();
    public $language;

    //Конструктор с 8 параметрами
    public function __construct($id, $title, $description, $releaseYear, $length, $actors, $categories, $language)
    {
        //Вызывается конструктор, объявленный в родительском классе Film
        parent::__construct($id, $title, $description, $releaseYear, $length);
         //Инициализируем свойства класса FilmInfo
        $this->actors=$actors;
        $this->categories=$categories;
        $this->language=$language;
    }
}

