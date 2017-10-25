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

        <title>Practice 2. Courses</title>
    </head>
    <body class="bg">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="header"><h2>Сourses</h2></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 offset-md-0">



                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <!--<a class="navbar-brand" href="#">Home</a>-->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">




                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Category
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                            <?php
                                            $db=new PDOService();
                                            foreach ($db->getAllCategories() as $category) {
                                            ?>

                                            <a class="dropdown-item" href="Index.php" tar> <?php echo $category->name ?></a>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>



                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Actors</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>


                        

                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer"><h6>© Julija Mironova RDIR51</h6></div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>