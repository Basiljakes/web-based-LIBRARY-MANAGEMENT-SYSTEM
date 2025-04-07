<!DOCTYPE html>
<html>

<head>
    <title>
        User registration
    </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <header style="height: 100px;">
        <div class="logo">
            <h1 style="color: white; font-size: 20px; line-height: 20px; margin-top: 20px;">GOSHEN ONLINE LIBRARY
                MANAGEMENT SYSTEM</h1>
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

    <section>
        <div class="reg_pics">
            <br>
            <div class="reg_area">
                <h1
                    style="text-align: center; font-size: 35px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM
                </h1><br><br><br>
                <h1 style="text-align: center; font-size: 30px;">
                    User Registration form
                </h1><br>
                <form name="Registration" action="" method="">                    
                    <div class="reg_form">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" placeholder="enter first Name" required=""><br><br>
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="enter Last Name" required=""><br><br>
                        <label for="email">Email &nbsp; &nbsp; &nbsp;&nbsp;</label>
                        <input type="email" name="email" placeholder="enter Email" required=""><br><br>
                        <label for="username">User Name</label>
                        <input type="text" name="username" placeholder="enter User Name" required=""><br><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="enter password" required=""><br><br>
                        <input class="btn btn-default" type="submit" name="submit" value="Sign Up">
                        <button>Sign Up</button>
                    </div>
                </form>
                <p>

                </p>
            </div>

        </div>





</body>
