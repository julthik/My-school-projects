<!DOCTYPE html>
<!--
Регистрация студентов колледжа на курсы

    Необходимо создать 2 проекта: PHP, Java
    Создайте форму для регистрации, используя различные элементы для удобства заполнения данных (list, radiobutton, checkbox ...)
    Данные, введенные пользователем, должны отобразиться в таблице на другой странице.
    Используйте CSS. (Можете попробовать использовать CSS-фреймворки: Bootstrap, Foundation…)
    Создайте макет страницы, используя HTML элементы header, footer, nav...

Julija Mironova 154462
-->
<html>
    <head>  
        <meta charset="UTF-8">
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title>Practice 1. Student registration</title>
    </head>
    <body class="bg">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="header"><h2>Registering college students for courses</h2></div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <table border="2" cellspacing="2" cellpadding="1" name="tabel1">
                            <tbody>
                                <tr class="bg-info">
                                    <th>First name</th>
                                    <td><?php echo $_POST['firstName']; ?></td>
                                </tr>
                                <tr>
                                    <th>Last name</th>
                                    <td><?php echo $_POST['lastName']; ?></td>
                                </tr>
                                <tr class="bg-info">
                                    <th>Email</th>
                                    <td><?php echo $_POST['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Group and course</th>
                                    <td><?php echo $_POST['group']; ?></td>
                                </tr>
                                <tr class="bg-info">
                                    <th>Course</th>
                                    <td><?php echo $_POST['course']; ?></td>
                                </tr>
                                <tr>
                                    <th>Course Language</th>
                                    <td><?php if (isset($_POST['radio'])) echo $_POST['radio']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2"></div>
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