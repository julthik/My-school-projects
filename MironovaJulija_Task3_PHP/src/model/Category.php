<?php
//Класс Category
class Category
{
    //Объявление свойств
    public $id;
    public $name;

    //Конструктор с 2 параметрами
     public function __construct($id, $name)
     {
         //Инициализация свойств
         $this->id=$id;
         $this->name=$name;
     }

     public function getId() {
        return $this->id;
    }
}