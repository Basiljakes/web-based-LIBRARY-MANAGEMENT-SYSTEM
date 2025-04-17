<?php
    session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>      
    <title>
        
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <!--favicon icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME-PAGE</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>

            <?php
                if (isset($_SESSION['login_user']))
                    {
                        ?>
                        
                        <?php 
                        ?>
                            <ul class="nav navbar-nav">                                                               
                                <li><a href="profile.php">PROFILE</a></li>
                                <li><a href="fine.php">FINE</a></li>
                            </ul>
                        <ul class="nav navbar-nav navbar-right ">
                            <li><a href="">                          
                            <div style="color: white;">                              
                                <?php
                                ?>
                                <i class="fa-solid fa-user"></i>                   

                                <?php
                                
                                //echo "<img class='img-circle profile_img ' height=30 width=30  src='images/". $_SESSION['pic']."'>";//
                                echo "welcome " . $_SESSION['login_user']; 
                                ?>                            
                            </div>
                            <li><a href="logout.php"><span  class="glyhicon glyphicon-log-0ut"> LOGIN OUT</span></a></li>
                           
                        </ul>
                     <?php
                    }  
                else
                {
                        ?>
                    <ul class="nav navbar-nav navbar-right ">                
                        <li><a href="admin_login.php"><span  class="glyhicon glyphicon-log-in"> ADMIN-LOGIN</span></a></li>                        
                        <li><a href="registration.php"><span  class="glyhicon glyphicon-user"> SIGN UP</span></a></li>
                        
                    </ul>

                    <?php
                }
            ?>            
        </div>

    </nav>

   

</body>
</html>