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
                        $course = new listCourses;
                        $id = $_REQUEST['send'];
                        $fullCourseData = $course->findByID($id);
                        ?>
                        <table border="1" cellspacing="5" cellpadding="5" class="table table-striped">
                            <tr>
                                <th></th>
                                <th width="250">Сourse name</th>
                                <th >Course code</th>
                                <th >ECTS credits</th>
                                <th >Assessment form</th>
                                <th width="250">Brief description of the course</th>
                                <th width="150">Lecturer</th>
                                <th width="300">Registered students</th>
                            </tr>
                            <tr>
                                <td ><?php echo($fullCourseData->getId()); ?></td>
                                
                                <td ><?php echo($fullCourseData->getName()); ?></td>
                                <td ><?php echo($fullCourseData->getCode()); ?></td>
                                <td ><?php echo($fullCourseData->getEap()); ?></td>
                                <td ><?php echo($fullCourseData->getGrade()); ?></td>
                                <td ><?php echo($fullCourseData->getDescription()); ?></td>
                                <td ><?php echo($fullCourseData->getLecturer()); ?></td>
                                <td >
                                    <?php
                                    $students = new ListStudents;
                                    foreach ($students->findAll() as $student) {
                                        if ($student->getId() == $id) {
                                            echo($student->getLastname() . " ");
                                            echo($student->getFirstname() . " ");
                                            echo($student->getGroup());
                                            echo "<h1>".nl2br("")."</h1>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table></br>
                        <div>
                        <a href="Index.php"><input type="submit" class="btn btn-info" value="Go back" name="Btn_Tagasi" /></a>
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