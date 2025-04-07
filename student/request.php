<?php

   include "connection.php";
   include "navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Book Request</title>
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
            padding-left: 1000px;
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
        .h: hover {
            background-color: #f1f1f1;
            color: white;
            height: 50px;
            width: 200px;
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
 

  <div class="h" <a href="profile.php">Profile</a> </div>
  <a href="books.php">Books</a>
  <a href="request.php">Book Request</a>
  <a href="issue_info.php">Issued information</a>
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
  
  <?php
    if (isset($_SESSION['login_user']))
    {
        $q=mysqli_query($db, "SELECT * FROM `issue_book` WHERE username ='$_SESSION[login_user]';") 
        or die(mysqli_error($db));

        if (mysqli_num_rows($q)==0) 
        {
            echo "Apologies! No pending request.";
        }
        else
        {
            echo "<table class='table table-bordered table-hover'>";
            echo "<tr style='background-color: #d1baba;'>";
            //Table header
            echo "<th>"; echo "Book ID"; echo "</th>";
            echo "<th>"; echo "Approved Status"; echo "</th>";
            echo "<th>"; echo "Issue Date"; echo "</th>";
            echo "<th>"; echo "Status"; echo "</th>";            
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($q)) 
            {
                echo "<tr>";
                echo "<td>"; echo $row['book_id']; echo "</td>";
                echo "<td>"; echo $row['approve']; echo "</td>";
                echo "<td>"; echo $row['issue']; echo "</td>";
                echo "<td>"; echo $row['restore']; echo "</td>";                
                echo "</tr>";
            }
              echo "</table>";
            }
        }
           else
           {
            echo "</br></br></br>";
            echo "<h2 style='color: black; font-family: lucida console; text-align: left'>";
            echo"PLEASE LOGIN TO VIEW YOUR REQUEST."; 
            echo "</b></h2>";          
           }
        
        
        
    
    ?>


    
</body>
</html>