<?php
//Интерфейс IServiceDB, методы которого будут реализованы в классах MySQLiService и PDOService
interface IServiceDB
{
    //Открытые абстрактные методы, реализация которых будет в классах MySQLiService и PDOService
    public function connect();
    public function getAllFilms();
    public function getFilmByID($id);
    public function getAllFilmsInfo();
    public function getAllCategories();
    public function getAllActors();
}