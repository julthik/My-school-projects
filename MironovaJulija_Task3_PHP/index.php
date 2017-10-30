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

                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="category" class="collapse navbar-collapse" id="navbarNavDropdown">
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
                                            <a class="dropdown-item" href="Index.php?send=<?php echo $category->getId(); ?>" name="send"> <?php echo $category->name ?></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="IndexActors.php">Actors</a>
                                    </li>

                                </ul>
                            </div>
                        </nav>


                        <?php 
                       /* $id = $_REQUEST['send'];
                        if(empty($id)){
                        ?>
                            <H2 align="center"><?php echo "To see a list of movies, select the category or actor that interests you";?></H2><?php 
                        }else{
                            $db=new PDOService();
                            foreach ($db->getAllFilmsInfo() as $film) {
                        
                                if ($film->hasCategory($id)) {
                                    echo "<p><b>".$film->id." ".$film->title.", ".$film->releaseYear."</b><br />".$film->description."<br /><br /></p>";
                        }
                        }
                    }*/


                    $id = $_REQUEST['send'];
                    if(empty($id)){
                    ?>
                        <H2 align="center"><?php echo "To see a list of movies, select the category or actor that interests you";?></H2><?php 
                    }else{
                        $db=new PDOService();
                        $control=0;
                        foreach ($db->getAllFilmsInfo() as $film) {
                            if ($film->hasCategory($id)) {
                                    echo "<p><H4 style='color:#17a2b8'><b>".$film->title.", ".$film->releaseYear."</b></H4><br />".$film->description."<br /></p>";
                                    echo "<p><b>Categories</b></p>";
                                    foreach($film->categories as $c){
                                        echo "<H5>".$c->name." </H5>";
                                    } 
                                    echo "<p><b><br />Actors</b></p>";
                                    $counter=1;
                                    foreach($film->actors as $f){
                                        $result = count($film->actors);
                                            if($result>$counter){
                                                $counter=$counter+1;
                                                echo "<H5>".$f->firstname." ".$f->lastname.", </H5>";
                                            }else{
                                                echo "<H5>".$f->firstname." ".$f->lastname."</H5>";
                                            } 
                                    } 
                                    $control=$control+1;
                                    echo "<br /><br />";
                            }
                        } 
                        if($control==0)  {
                            echo "<H2 align='center'>So far there are no movies. Choose another category.</H2>";
                        } 
                        $control=0;
                }
                        ?>

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