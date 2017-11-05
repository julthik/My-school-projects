<?php
//Класс Actor
class Actor
{
    //Объявление свойств
    public $id;
    public $lastname;
    public $firstname;

    //Конструктор с 3 параметрами
     public function __construct($id, $firstname, $lastname)
     {
         //Инициализация свойств
         $this->id=$id;
         $this->firstname=$firstname;
         $this->lastname=$lastname;
     }

     //Возвращается id автора
     public function getId() {
        return $this->id;
    }
}