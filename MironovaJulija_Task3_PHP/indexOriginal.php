<?php
//Включается и выполняется указанный файл, если он ещё не включался
require_once "autoloader.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
		//Инициализация $db
			//$db=new MySQLiService();
			$db=new PDOService();
			//Через цикл foreach перебирается весь массив и на экран выводится id и title фильма
			foreach ($db->getAllFilms() as $film) {
				echo $film->id." ".$film->title."<br />";
			}
			echo "<br /><br /><br /><br />";
			//Поиск фильма по id
			$film=$db->getFilmByID(3);
			if (!is_null($film)) {//Если переменная $film не равна NULL
				echo "Film found: ".$film->title."<br />";//выводится название фильма
			}
			else {//Иначе
				echo "Not found"."<br />";//Фильм выводится на экран, что фильм отсутствует
			}
			echo "<pre>";
			echo "<br /><br /><br /><br />";
			/*
			Выводится вся информация о фильме
			var_dump отобразит структурированную информацию, включая тип и значение
			а с помощью тега <pre> на экран выведется форматированный текст, со всеми отступами, иначе вывод был бы в однку строку
			*/
			$films=$db->getAllFilmsInfo();
			foreach ($films as $film) {
				var_dump($film);
			}
			echo "</pre>";
        ?>
    </body>
</html>
