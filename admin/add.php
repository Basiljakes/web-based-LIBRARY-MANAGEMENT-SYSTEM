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
    <title>Books</title>
    <style type="text/css">
        .search-bar
        {
            padding-left: 1000px;
            padding-top: 5px;
                     
            
        }
        body 
        {
            background-color: #bcd76247;
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
        .h:hover{
            background-color: #d1baba;
            color: white;
            height: 50px;
            width: 300px;
        }
        .book
        {
            width: 450px;
            margin: 0 auto;                        
            /*height: 20px;
            background-color: #ffffff;        
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            */
        }
        .form-control
        {
            background-color: #d7cdd38a;
            color: black;
            height: 40px;
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
    </div><br><br>
 

  <div class="h"> <a href="add.php">Add Books</a> </div>
  <div class="h"><a href="delete.php">Delete Books</a> </div>
  <div class="h"><a href="">Book Request</a> </div>
  <div class="h"><a href="#">Issued information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container">
    <h2 style="color; black; font-family: lucida console; text-align: center">Add New Books</h2>

    <form class="book" action="" method="post" style="text-align: center;">
        <input type="text" name="book_id" class="form-control" placeholder="Book ID" required><br><br>
        <input type="text" name="title" class="form-control"  placeholder="Book title" required><br><br>
        <input type="text" name="authors" class="form-control" placeholder="Author Name" required><br><br>
        <input type="text" name="ISBN" class="form-control" placeholder="ISBN" required><br><br>        
        <input type="text" name="status" class="form-control" placeholder="Book Status" required><br><br>
        <input type="text" name="quantity"  class="form-control"  placeholder="Book Quantity" required><br><br>
        <input type="text" name="department" class="form-control" placeholder="Department" required><br>
        <button class="btn btn-default"  type="submit" name="submit" >ADD</button>
    </form>
  </div>

  <?php
    if (isset($_POST['submit'])) 
    {
        if(isset($_SESSION['login_user']))
        {
            mysqli_query($db,"INSERT INTO books VALUES ('$_POST[book_id]','$_POST[title]','$_POST[authors]','$_POST[ISBN]','$_POST[status]','$_POST[quantity]','$_POST[department]');")
            or die(mysqli_error($db));
        ?>
        <script type="text/javascript">
          alert("Book Added successfully");
          </script>"

        <?php
        }
        else
        {
            ?>
            <script type="text/javascript">
            alert('Please login to Add books.');
            </script>";
        
            <?php
        }
    }
    ?>



</div>
    <script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    document.getElementById("main").style.marginLeft = "300px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("main").style.backgroundColor = "#bcd76247";
    }
    </script>

</body>
</html>
