
<?php
 include "navbar.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Student Login
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        section
        {
            margin: -15px;
        }
    </style>

</head>

<body>
    <!--
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME-PAGE</a></li>
                <li><a href="books.php">BOOKS</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">                
                <li><a href="student_login.php"><span  class="glyhicon glyphicon-log-in"> LOGIN</span></a></li>
                <li><a href="student_login.php"><span  class="glyhicon glyphicon-log-out"> LOGIN OUT</span></a></li>
                <li><a href="registration.php"><span  class="glyhicon glyphicon-user"> SIGN UP</span></a></li>
                <li><a href="">ADMIN_LOGIN</a></li>


            </ul>
        </div>

    </nav>

    
    <header style="height: 100px;">
        <div class="logo">           
            <h1 style="color: white; font-size: 20px; line-height: 20px; margin-top: 20px;">GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">HOME-PAGE</a></li>                
                <li><a href="student_login.html">STUDENT-LOGIN</a></li>
                <li><a href="registration.html">REGISTRATION</a></li>
                <li><a href="books.html">BOOKS</a></li>

            </ul>
        </nav>
 
    </header>
    -->
    <section>
        <div class="login_pics">
            <br><br><br>
            <div class="student_area1">
                <h1
                    style=" font-size: 35px; color: black; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM
                </h1><br>
                <h1
                    style=" font-size: 30px; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; color: black;">
                    User Login
                </h1>
                <form name="login" action="" method="">
                    <br>
                    <div class="login_form">
                        Username
                        <input class="form-control" type="text" name="username" placeholder="enter username"
                            required=""><br>
                        Password
                        <input class="form-control" type="password" name="password" placeholder="enter password"
                            required=""><br>
                        <input class="btn btn-default" type="submit" name="submit" value="Login"
                            style="color: black; width: 70px; height: 30px;">
                        <button>Login</button>
                    </div>
                </form>
                <p style="color: white; text-align: center;">
                    <br><br>
                    <a style="color: white;" href="">Forgot password?</a> &nbsp;&nbsp;&nbsp;
                    New to this website? &nbsp; <a href="registration.html">Sign Up</a>
                </p>
            </div>

        </div>


    </section>

    <section>

    </section>


</body>









</html>
