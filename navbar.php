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
    <link rel="stylesheet" type="text/css" href="student/assets/style.css">    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                                    echo "welcome " . $_SESSION['login_user']; ?>                            
                                </div>
                            
                            <li><a href="logout.php"><span  class="glyhicon glyphicon-log-0ut"> LOGIN OUT</span></a></li>
                        </ul> 
                     <?php
                    }
                else
                {
                        ?>
                    <ul class="nav navbar-nav navbar-right ">                
                        <li><a href="login.php"><span  class="glyhicon glyphicon-log-in"> LOGIN</span></a></li>                        
                        <li><a href="registration.php"><span  class="glyhicon glyphicon-user"> SIGN UP</span></a></li>
                        <li><a href="">ADMIN_LOGIN</a></li>
                    </ul>

                    <?php
                }
            ?>




            

            
        </div>

    </nav>
    <?php
        if (isset($_SESSION['login_user']))
        {
            $day = 0;
            $exp = '<p style="color: yellow; background-color: red;  ">EXPIRED</p>';
            $res = mysqli_query($db, "SELECT issue_book.restore FROM issue_book 
            WHERE username = '$_SESSION[login_user]' AND approve = '$exp' LIMIT 1;")  or die(mysqli_error($db));
            

            while ($row = mysqli_fetch_assoc($res))  
            {
                $d = strtotime($row['restore']);
                $c = strtotime(date("Y-m-d"));
                $diff = $c - $d;
                

                if ($diff> 0) 
                {
                    $day = $day + floor($diff / (60 * 60 * 24));
                    $day = abs($day);
                                                      
                }                                 
            } 
            $_SESSION['fine'] = $day* .10;  
            echo $day;                       
                        
        }
       
    ?>




</body>
</html>