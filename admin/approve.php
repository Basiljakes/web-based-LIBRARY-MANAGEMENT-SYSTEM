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

    <title>Approved Request</title>
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
        .srch
        {
            padding-left: 800px;
            padding-top: 5px;
                                 
        }
        .form-control
        {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
            border: 1px solid white;


        }
        body 
        {
            background-image: url("images/request2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
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
        .container
        {  
            width: 80%;          
            height: 600px;
            background-color: black;
            opacity: 0.7;
            color: white;
            margin-top: 30px;
            
        }
        .Approve
        {
            Margin-left: 130px;
            padding-left: 400px;
            padding-top: 50px;
        }
        /*   
        .Approve input[type="text"]
        {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
            border: 1px solid white;
        }
        .Approve button[type="submit"]
        {
            width: 300px;
            height: 40px;
            background-color: black;
            color: white;
            border: 1px solid white;
            margin-top: 20px;
        }*/


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
    <div class="container">
     <br><h3 style="text-align: center;" >Approved Request</h3><br><br>
        <form action=""  method="POST" class="Approve">
            <input type="text" name="approve" class="form-control" placeholder="Approve YES or NO" required=""><br>
            <input type="text" name="issue" class="form-control" placeholder="ISSUE Date yyyy-mm-dd" required=""><br>
            <input type="text" name="restore" class="form-control" placeholder="RETURN Date yyyy-mm-dd" required=""><br>
            <button type="submit" name="submit" class="btn btn-default">Approve</button>
        </form>


    </div>
        
 <div>
    <?php
     if(isset($_POST['submit']))
     {
        mysqli_query($db,"UPDATE `issue_book` SET `approve`='$_POST[approve]',`issue`='$_POST[issue]',
        `restore`='$_POST[restore]' WHERE  username='$_SESSION[name]' AND book_id='$_SESSION[book_id]';") 
        or die(mysqli_error($db));
        
      

        mysqli_query($db,"UPDATE books SET quantity=quantity-1 WHERE book_id='$_SESSION[book_id]';") 
        or die(mysqli_error($db)); 
        
        

         $res=mysqli_query($db,"SELECT quantity FROM books WHERE book_id='$_SESSION[book_id]';") 
         or die(mysqli_error($db));
        
       

        while($row=mysqli_fetch_array($res))
        {

            if($row['quantity']<=0)
            {
                mysqli_query($db,"UPDATE books SET status='Not Available' WHERE book_id='$_SESSION[book_id]';");                
               

            }
        }
        echo "<script>alert('Book Approved');</script>";
        echo "<script>window.location='request.php';</script>";       
        
     }


    ?>




</body>
</html>