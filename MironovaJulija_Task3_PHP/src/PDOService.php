<?php
//Класс PDOService, который реализует интерфейс IServiceDB
class PDOService implements IServiceDB
{	
	private $connectDB;
	
	//Метод, для подключения к базе данных
	public function connect() {
		//Подключение к MySQL и обработка исключений	
        try {
			//В connectDB задается тип БД (mysql), хост, имя базы данных, чарсет, имя пользователя и пароль
            $this->connectDB = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=".DB_CHARSET, 
                                DB_USERNAME, DB_PASSWORD);
		}
		//Обработка ошибки и выход		
		catch (PDOException $ex) {
			printf("Connection failed: %s", $ex->getMessage());
			exit();
		}
		//Если ошибок нет, возвратит true
		return true;
	}
	
	//Метод, возвращюший все фильмы
	public function getAllFilms()
	{	
		$films=array();//Массив $films
		if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
			if ($result = $this->connectDB->query('SELECT * FROM film')) {//Выполняется запрос к базе данных,где выбирается всё из таблицы film из базы данных
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);//В $rows возвратится массив, содержащий данные и текстовые индексы ('film_id', 'title'...)
                foreach($rows as $row){
					$films[]=new Film($row['film_id'], $row['title'], $row['description'], //Запись в массив объекты класса Film
										$row['release_year'], $row['language_id'], $row=['length']);
                 } 
			}
		}
        $this->connectDB=null;//Закрытие соединения с базой данных
		return $films;//Возврат массива $films
	}

	//Метод, возвращающий конкретный фильм по $id
	public function getFilmByID($id)
	{	
		$film=null;
		if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
			if ($result = $this->connectDB->prepare('SELECT * FROM film WHERE film_id=:id')) {//Представляет подготовленный запрос к базе данных, но ещё без данных
				$result->execute(array('id'=>$id));// С помощью execute(), передаётся prepare() массив с переменными
				//$result->execute(['id'=>$id]);
                // $result->bindValue(':id', $id, PDO::PARAM_INT);
                // $result->execute();
				
				$numRows = $result->rowCount();//Возвращает количество строк
				if ($numRows==1) {//Если количество строк равно 1
					$row=$result->fetch();//Извлекается нужная нам строка из результирующего набор
					$film=new Film($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);//Создается объект класса Film со значениями
				}
			}
		}
        $this->connectDB=null;//Закрытие соединения с базой данных
	    return $film;//Возврат $film
	}

	//Метод, возвращающий полную информацию о фильмах
    public function getAllFilmsInfo()
	{
		$films=array();//Массив $films
		if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
			if ($result = $this->connectDB->query('SELECT * FROM film_info')) {//Выбирается всё из таблицы film_info из базы данных
				$rows = $result->fetchAll(PDO::FETCH_ASSOC);//В $rows возвратится массив, содержащий данные и текстовые индексы ('film_id', 'title'...)
                foreach($rows as $row){
					$actors=array();//Массив $actors
					foreach (explode(";",$row['actors']) as $item) {//Строка рабивается разделителем ; на элементы массива
					   $actor=explode(",",$item);//Значения конвертируются через запятую в массив 
					   $actors[]=new Actor($actor[0], $actor[1],$actor[2]);//Создается объект класса Actor со значениями
					}
					$categories=array();//Массив $categories
					foreach (explode(";",$row['categories']) as $item) {//Строка рабивается разделителем ; на элементы массива
					   $category=explode(",",$item);//Значения конвертируются через запятую в массив 
					   $categories[]=new Category($category[0], $category[1]);//Создается объект класса Category со значениями
					}
					$item=explode(',',$row['language']);//Значения конвертируются через запятую в массив 
					$language=new Language($item[0], $item[1]);//Создается объект класса Language со значениями
					$films[]=new FilmInfo($row['id'], $row['title'], $row['description'], 
										$row['year'],  $row=['length'], $actors, $categories, $language);//Создается объект класса FilmInfo со значениями				
                 } 				
			}
		    $this->connectDB=null;//Закрытие соединения с базой данных
		}
		return $films;//Возврат массива $films
	}

	public function getAllCategories(){	
			$categories=array();//Массив $categories
			if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
				if ($result = $this->connectDB->query('SELECT * FROM category')) {//Выполняется запрос к базе данных,где выбирается всё из таблицы category из базы данных
					$rows = $result->fetchAll(PDO::FETCH_ASSOC);//В $rows возвратится массив, содержащий данные и текстовые индексы
					foreach($rows as $row){
						$categories[]=new Category($row['category_id'], $row['name']);
					 } 
				}	
			}
			$this->connectDB=null;//Закрытие соединения с базой данных
			return $categories;//Возврат массива $films
		}

}

