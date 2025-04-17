
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
            margin: -75px;
        }
        .sidenav {
            height: 100%;
            margin-top: 80px;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #222222;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
            }

        .sidenav a:hover {
            color: #f1f1f1;
            }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            }

        #main {
            transition: margin-left .5s;
            padding: 10px;
            color: white;
            }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
        .fa-user
        {
            font-size: 20px;
            color: white;
        }
        #sidenav_icon
        {
            position-center: auto;
            font-size: 70px;
            align-item: center;
            margin-left: 100px;
        }
        .h: hover {
            background-color: #f1f1f1;
            color: white;
            height: 50px;
            width: 200px;
        }
        .container
        {  
            width: 80%;          
            height: 800px;
            background-color: black;
            opacity: 0.7;
            color: white;
            margin-top: -65px;
            
        }
        .scroll
        {
            width: 100%;
            height: 400px;
            overflow: auto;       
        } 
        th, td {
            width: 10%;
        }         
    </style>
    

</head>

<body>
    <!---------sidenav--------->
   <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div style="color: white; font-size: 30px;">                              
        <?php
        if (isset($_SESSION['login_user'])) 
        {
            ?>
            <i id="sidenav_icon" class="fa-solid fa-user" ></i>
            <br>
        <?php
            //echo "<img class='img-circle profile_img ' height=30 width=30  src='images/". $_SESSION['pic']."'>";//
            echo "welcome " . $_SESSION['login_user'];
        }
        
        ?>                            
    </div>
 

  <div class="h"><a href="profile.php">Profile</a> </div>
  <a href="books.php">Books</a> 
  <a href="request.php">Book Request</a>
  <a href="issue_info.php">Issued information</a>
  <a href="expired.php">Expired List</a>
  <div class="h"><a href="admin_reg.php">Admin Registraion</a> </div>
  <div class="h"><a href="student_reg.php">Student Registration</a> </div>
  </div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    }
    </script>

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
                        <input type="text" name="firstname"  placeholder="enter first Name" required=""><br><br>
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