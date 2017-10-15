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
                        <form action="Tabel.php" target="_blank" name="form" method="post">
                            <div class="form-group">
                                <label><b>First name</b></label>
                                <input type="text" name="firstName" class="form-control" placeholder="Enter first name">
                                <label><b>Last name</b></label>
                                <input type="text" name="lastName" class="form-control"  placeholder="Enter last name">
                                <label><b>Email address</b></label>
                                <input type="email" name='email' class="form-control"  placeholder="Enter email">
                                <label><b>Group name</b></label>
                                <input type="text" name="group" class="form-control" placeholder="Enter group name">
                                <label><b>Choose course</b></label>
                                <select name="course" class="custom-select d-block my-3" required>
                                    <option value="">Open this select menu</option>
                                    <option value="Cyber Security and Law">Cyber Security and Law</option>
                                    <option value="Privacy and data protection law">Privacy and data protection law</option>
                                    <option value="Protection of Information Technology Products">Protection of Information Technology Products</option>
                                    <option value="Rights, Obligations and Liability of Actors on the Internet">Rights, Obligations and Liability of Actors on the Internet</option>
                                    <option value="Digital Evidences">Digital Evidences</option>
                                    <option value="Legal Aspects of Software and Database Protection">Legal Aspects of Software and Database Protection </option>
                                    <option value="Entrepreneurship and Business Planning">Entrepreneurship and Business Planning</option>
                                </select>
                                <label><b>Course language</b></label><br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="radio" type="radio" name="inlineRadioOptions" value="English" > English
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="radio" type="radio" name="inlineRadioOptions" value="Estonian" checked=""> Estonian
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" name="radio" type="radio" name="inlineRadioOptions" value="Russian"> Russian
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" value="Submit" name="Submit" />
                                <input type="reset"  class="btn btn-secondary" value="Reset" name="Reset" />
                            </div>
                        </form>
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