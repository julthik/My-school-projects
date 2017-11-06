<?php
//Класс MySQLiService, который реализует интерфейс IServiceDB
class MySQLiService implements IServiceDB
{	
	private $connectDB;

	//Метод, для подключения к базе данных
	public function connect() {	
		//В connectDB задается хост, имя пользователя, пароль и имя базы данных
		$this->connectDB = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		//Задается кодировка
		$this->connectDB->set_charset(DB_CHARSET);
		//Возвращает код ошибки при попытки соединения, если она имеется
		if (mysqli_connect_errno()) {
			printf("Connection failed: %s", mysqli_connect_error());
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
			if ($result = mysqli_query($this->connectDB, 'SELECT * FROM film')) {//Выполняется запрос к базе данных
				while ($row = mysqli_fetch_assoc($result)) {//Извлекается результирующий ряд в виде ассоциативного массива (ключ => значение)
					$films[]=new Film($row['film_id'], $row['title'], $row['description'], //Запись в массив объекты класса Film
										$row['release_year'],  $row=['length']);
                 } 
				 mysqli_free_result($result);//Очистка памяти от результата запроса
			}
		    mysqli_close($this->connectDB);//Закрытие соединения с базой данных	
		}
		return $films;//Возврат массива $films
	}
	
	//Метод, возвращающий конкретный фильм по $id
	public function getFilmByID($id)
	{	
		$film=null;
		if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
			if ($query = mysqli_prepare($this->connectDB, 'SELECT * FROM film WHERE film_id=?')) {//Создается подготавливаемый запрос
				$query->bind_param("i", $id); //"i" - $id is integer Привязка переменной к параметрам подготавливаемого запроса 
				$query->execute();//Выполнение подготовленного запроса
				$result = $query->get_result();//Получение результата из подготовленного запроса
				$numRows = $result->num_rows;//Возвращает количество строк
				if ($numRows==1) {//Если количество строк равно 1
					$row=$result->fetch_array(MYSQLI_NUM);//Получение строки запроса в виде массива 
					$film=new Film($row[0], $row[1], $row[2], $row[3], $row[5]);//Создается объект класса Film со значениями
				}
				$query->close();//Закрытие запроса
			}
		    mysqli_close($this->connectDB);//Закрытие соединения с базой данных	
		}
	    return $film;//Возврат массива $film
	}

	//Метод, возвращающий полную информацию о фильмах
	public function getAllFilmsInfo()
	{
		$films=array();//Массив $films
		if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
			if ($result = mysqli_query($this->connectDB, 'SELECT * FROM film_info')) {//Выполняет запрос к базе данных 
				while ($row = mysqli_fetch_assoc($result)) {//Извлекается результирующий ряд в виде ассоциативного массива (ключ => значение)
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
				 mysqli_free_result($result);//Очистка памяти от результата запроса
			}
		    mysqli_close($this->connectDB);//Закрытие соединения с базой данных		
		}
		return $films;//Возврат массива $films
	}

		//-----
		public function getAllCategories(){	
			$categories=array();//Массив $categories
			if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
				if ($result = mysqli_query($this->connectDB, 'SELECT * FROM category')) {//Выполняется запрос к базе данных,где выбирается всё из таблицы category из базы данных
					while ($row = mysqli_fetch_assoc($result)) {//Извлекается результирующий ряд в виде ассоциативного массива (ключ => значение)
						$categories[]=new Category($row['category_id'], $row['name']);//Запись в массив объекты класса Category
					 } 
					 mysqli_free_result($result);//Очистка памяти от результата запроса
				}
				mysqli_close($this->connectDB);//Закрытие соединения с базой данных	
			}
			return $categories;//Возврат массива $categories
		}


		public function getAllActors(){	
			$actors=array();//Массив $actors
			if ($this->connect()) {//Если подключение к базе данных пройдёт успешно
				if ($result = mysqli_query($this->connectDB, 'SELECT actor_id, firstname, lastname FROM actor ORDER BY lastname ASC')) {//Выполняется запрос к базе данных,где выбирается всё из таблицы category из базы данных
					while ($row = mysqli_fetch_assoc($result)) {//Извлекается результирующий ряд в виде ассоциативного массива (ключ => значение)
						$actors[]=new Actor($row['actor_id'], $row['firstname'], $row['lastname']); //Запись в массив объекты класса Actor
					 } 
					 mysqli_free_result($result);//Очистка памяти от результата запроса
				}
				mysqli_close($this->connectDB);//Закрытие соединения с базой данных	
			}
			return $actors;//Возврат массива $films
		}

}

