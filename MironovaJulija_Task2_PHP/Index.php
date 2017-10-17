<!DOCTYPE html>
<!--
Регистрация студентов колледжа на курсы (PHP)

Создайте Web приложение, которое содержит информацию о курсах и студентах, которые записались на курсы
    На главной странице выводятся название курсов и их код
    Пользователь может выбрать курс и посмотреть на другой странице полную информацию о курсе и кто записался на данный курс

Для реализации создайте классы, которые описывают модель системы
При оценивании также будет учитываться внешний вид пользовательского интерфейса
Используйте git при пректировании проекта

Julija Mironova 154462
-->
<?php
require_once 'Classes/Person.php';
require_once 'Classes/Student.php';
require_once 'Classes/Course.php';
require_once 'ReadingRecordsFromCsv/ListCourses.php';
require_once 'ReadingRecordsFromCsv/ListStudents.php';
require_once 'Classes/FindData.php';
?>

<html>
    <head>  
        <meta charset="UTF-8">
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
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
                        <?php
                        $data = new ListCourses;
                        foreach ($data->findAll() as $course) {
                            ?>
                            <table border="1" cellspacing="5" cellpadding="5" class="table table-hover" >
                            <tbody>
                                <tr scope="row">
                                    <td width="5"><?php echo($course->getId()); ?></td>
                                    <td width="200"><?php echo($course->getName()); ?></td>
                                    <td width="100"><?php echo($course->getCode()); ?></td>
                                    <td width="100"><a href="indexFull.php?send=<?php echo $course->getId(); ?>" name="send">More info</a></td>
                                </tr>
                        </tbody>
                            </table>
                            <?php
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