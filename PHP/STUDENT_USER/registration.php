
<?php
 include "connection.php";
 include "navbar.php";

?>

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

    

    <style>
        section
        {
            margin: -15px;
        }
    </style>
    

</head>

<body>
    <!--
    <header>
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
    </header>
    -->

    <section>
        <div class="reg_pics">
            <br>
            <div class="reg_area">
                <h1
                    style="text-align: center; font-size: 35px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM
                </h1><br><br>
                <h1 style="text-align: center; font-size: 30px;">
                    User Registration form
                </h1><br>
                <form name="Registration" action="" method="post">                    
                    <div class="reg_form" style="text-color: black;">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" style="text-color: black;"  placeholder="enter first Name" required=""><br><br>
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" placeholder="enter Last Name" required=""><br><br>
                        <label for="email">Email &nbsp; &nbsp; &nbsp;&nbsp;</label>
                        <input type="email" name="email" placeholder="enter Email" required=""><br><br>
                        <label for="username">User Name</label>
                        <input type="text" name="username" placeholder="enter User Name" required=""><br><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="enter password" required=""><br><br>
                        <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px;">
                        
                    </div>
                </form>
                <p>

                </p>
            </div>

        </div>
    </section>

    <?php
        if(isset($_POST['submit']))
        {
            $count=0;
            $sql="SELECT username from `student`";
            $res=mysqli_query($db,$sql);

            while($row=mysqli_fetch_assoc($res))
            {
                if($row['username']==$_POST['username'])
                {
                    $count=$count+1;
                }
            }
            if($count==0)
            {
                mysqli_query
                ($db,"INSERT INTO `student` VALUES('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$_POST[username]', '$_POST[password]');");
                ?>
                <script type="text/javascript">
                    alert("Nice your Registration successful");
                </script>        
                <?php
            }
           else
            {
                ?>
                <script type="text/javascript">
                    alert("This username already exist.");
                </script>
            <?php
            }
        }
    ?>
   




</body>
