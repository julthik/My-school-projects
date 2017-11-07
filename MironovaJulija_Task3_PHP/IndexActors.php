<!DOCTYPE html>
<!--
Ülesanne. Maailma filmid (30 p.)

1. Kommenteerige programmi kood Example. MoviesDB (15 p.)
2. Koostage menüü - (Category) (5 p.) - lisage getAllCategories funktsioon klassi.
3. Kuvage filmide loetelu valitud kategooria järgi (5 p.)
4. Looge leht Näitlejad (andmed sorteeritud perekonnanime järgi kasvavas järjekorras ). Kuvage filmide loetelu  valitud näitleja järgi (5 p.)

Kasutage Front-End Framework (näiteks, Bootstrap,...)

Julija Mironova 154462
-->
<?php
//Включается и выполняется указанный файл, если он ещё не включался
require_once "autoloader.php";//Благодаря содержимому autoloader.php можно не писать несколько раз require_once для всех нужных классов
?>

<html>
    <head>  
        <meta charset="UTF-8">
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <link href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css " rel="stylesheet "/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js "></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="Bootstrap/js/bootstrap.min.js "></script>
        <script src="Bootstrap/js/bootstrap.js "></script>

        <title>Practice 3. Movies</title>
    </head>
    <body class="bg">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="header"><h2><a href="Index.php">Movies</a></h2></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 offset-md-0">


                        <!-- Навигация по сайту-->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="category" class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                                <!-- Выпадающий список с элементами категории-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Category
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php
                                        //Инициализация $db
                                        $db=new PDOService();
                                        //$db=new MySQLiService();
                                        foreach ($db->getAllCategories() as $category) {//Через цикл foreach перебирается весь массив
                                        ?>
                                        <!-- Передача id категории через адресную строку и вывод названий категорий в выпадающем списке на экран-->
                                        <a class="dropdown-item" href="Index.php?send=<?php echo $category->getId(); ?>" name="send"> <?php echo $category->name ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </li>

                                <!-- Ссылка на страницу актёры-->
                                <li class="nav-item">
                                    <a class="nav-link" href="IndexActors.php">Actors</a>
                                </li>

                            </ul>
                        </div>
                    </nav>


                        <?php 
                        foreach ($db->getAllActors() as $actor) {//Через цикл foreach перебирается весь массив
                        $id=$actor->id;//$id присвается id автора?>
                        <div class="panel-group" id="collapse-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <!-- Кнопка с именем и фамилией актёра-->
                                        <a data-toggle="collapse" data-parent="#collapse-group" href="#<?php echo $actor->id; ?>"><?php echo "<H4 style='color:#000000'><b>".$actor->firstname." ".$actor->lastname."</H4>"; ?></a>
                                    </h4>
                                </div>
                                <div id="<?php echo $actor->id; ?>" class="panel-collapse collapse"><!-- Получение id актера-->
                                    <div class="panel-body">
                                        <?php
                                        foreach ($db->getAllFilmsInfo() as $film) {//Через цикл foreach перебирается весь массив
                                            foreach($film->actors as $f){//Перебираем вложенный массив с актерами
                                                if($id==$f->id){//Если полученный id равен id автора
                                                    //Выводим на экран фильмы данного актера
                                                    echo "<H4 style='color:#17a2b8'><b>".$film->title.", ".$film->releaseYear."</b></H4><H5>".$film->description."</H5><br /><br />";
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>


                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container" style='margin-top: 50px'>
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer"><h6>© Julija Mironova RDIR51</h6></div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>