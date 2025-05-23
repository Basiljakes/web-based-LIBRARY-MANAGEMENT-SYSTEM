<?php

   include "connection.php";
   include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DETAILS</title>
    <style type="text/css">
        .search-bar
        {
            padding-left: 1000px;
            padding-top: 5px;
                     
            
        }
    </style>
    <style type="text/css">
        .search-bar
        {
            padding-left: 850px;
            padding-top: 5px;
                     
            
        }
        body 
        {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;
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
            padding: 16px;
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
 

  <div class="h"><a href="profile.php">Profile</a></div>
  <a href="books.php">Books</a>
  <div class="h"><a href="request.php">Book Request</a> </div>
  <div class="h"><a href="issue_info.php">Issued information</a> </div>
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

    <!--=========== search bar ===========-->
    <div class="container">
        
    <div class="search-bar">
        <form class="navbar-form" method="post" name="form_search">
            <input class="form-control" type="text" name="search" placeholder="Student username..." required="">
            <button style="background-color: #82b383;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>
        
    </div>
    <h2>List of Students</h2>
    

    
        <?php
            if (isset($_POST['submit'])) 
            {
                $q=mysqli_query($db, "SELECT firstname, lastname, email, username FROM `student` WHERE username LIKE '%$_POST[search]%' ");

                if (mysqli_num_rows($q)==0) 
                {
                    echo "Apologies! No student name were found. Please try searching again.";
                }
                else
                {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #82b383;'>";
                        echo "<th>"; echo "First Name"; echo "</th>";
                        echo "<th>"; echo "Last Name"; echo "</th>";
                        echo "<th>"; echo "Email"; echo "</th>";
                        echo "<th>"; echo "Username"; echo "</th>";                        
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($q)) 
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['firstname']; echo "</td>";
                            echo "<td>"; echo $row['lastname']; echo "</td>";
                            echo "<td>"; echo $row['email']; echo "</td>";
                            echo "<td>"; echo $row['username']; echo "</td>";                           
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }  /*--- if the botton is not engaged--- */
            else
            {
                $res = mysqli_query($db, "SELECT firstname, lastname, email, username FROM `student`ORDER BY `student`.`firstname` ASC;");
                //<!-- while ($row = mysqli_fetch_assoc($res)) { //
                // Table header
                echo "<table class='table table-bordered table-hover'>";
                echo "<tr style='background-color: #82b383;'>";
                    echo "<th>"; echo "First Name"; echo "</th>";
                    echo "<th>"; echo "Last Name"; echo "</th>";
                    echo "<th>"; echo "Email"; echo "</th>";
                    echo "<th>"; echo "User Name"; echo "</th>"; 
                 
                  echo "</tr>";
                  while ($row = mysqli_fetch_assoc($res)) {
                      echo "<tr>";
                      echo "<td>"; echo $row['firstname']; echo "</td>";
                      echo "<td>"; echo $row['lastname']; echo "</td>";
                      echo "<td>"; echo $row['email']; echo "</td>";
                      echo "<td>"; echo $row['username']; echo "</td>";
                      
                      echo "</tr>";
                  }
                  echo "</table>";

            }          
            

            
        ?>
    </div>
    
</body>
</html>