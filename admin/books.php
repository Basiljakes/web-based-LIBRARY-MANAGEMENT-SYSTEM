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
    <link rel="stylesheet" href="assets/style.css">
    <title>Books</title>
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
            background-image: url(images/lib4.png);
            background-size: cover;
            
            
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

        .sidenav a 
        {
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
        .h {
            background-color: transparent;
            width: 300px;
        }
        .h:hover{
            background-color: rgb(24, 23, 23);
            color: white;
            height: 50px;
            width: 300px;
        }
        .h a 
        {
            color: #818181;
            text-decoration: none;
            display: block;
            height: 50px;
            line-height: 50px;
            padding-left: 32px;
        }

        .h:hover a 
        {
            color:rgb(126, 70, 70);
        }
        td, th {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #100b10;
            font-size: 20px;            
        }
        .h td:hover {
            background-color:rgba(90, 89, 41, 0.81);
            color: white;
            height: 50px;
            width: 300px;
        }
        .h th:hover {
            background-color: #f1f1f1;
            color: white;
            height: 50px;
            width: 300px;
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
  <div class="h"><a href="request.php">Book Request</a> </div>
  <div class="h"><a href="issue_info.php">Issued information</a></div>
  <div class="h"><a href="expired.php">Expired List</a> </div>
  <div class="h"><a href="admin_reg.php">Admin Registraion</a> </div>
    <div class="h"><a href="student_reg.php">Student Registration</a> </div>
        
    
</div>

<div id="main">
  <span style="font-size:30px; color: white;cursor:pointer" onclick="openNav()">&#9776; open</span>


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
    <div class="search-bar">
        <form class="navbar-form" method="post" name="form_search">
            <input class="form-control" type="text" name="search" placeholder="Search Books..." required="">
            <button style="background-color: #d1baba;" type="submit" name="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </form>        
        <form class="navbar-form" method="post" name="form_search">
            <input class="form-control" type="text" name="book_id" placeholder="Enter Book ID..." required="">
            <button style="background-color: #d1baba; width: 75px;" type="submit" name="submit1" class="btn btn-default">DELETE                               
            </button>
        </form>
        <!--=========== EDIT FORM ===========-->
        <form class="navbar-form" method="post" name="form_edit">
            <input class="form-control" type="text" name="edit_book_id" placeholder="Enter Book ID to Edit..." required="">
            <button style="background-color: #d1baba; width: 75px;" type="submit" name="submit_edit" class="btn btn-default">EDIT</button>
        </form>
              
        
    </div>
    
    <h2 style="color: white; font-size: 35px;">List of Books</h2>
    

    
    
        <?php
            if (isset($_POST['submit'])) 
            {
                $q=mysqli_query($db, "SELECT * FROM `books` WHERE title LIKE '%$_POST[search]%' ");

                if (mysqli_num_rows($q)==0) 
                {
                    echo "Apologies! No books were found. Please try searching again.";
                }
                else
                {
                    echo "<table class='table table-bordered table-hover'>";
                    echo "<tr style='background-color: #d1baba; color: white;'>";
                        echo "<th>"; echo "Book ID"; echo "</th>";
                        echo "<th>"; echo "Title"; echo "</th>";
                        echo "<th>"; echo "Author Name"; echo "</th>";
                        echo "<th>"; echo "ISBN"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Quantity"; echo "</th>"; 
                        echo "<th>"; echo "Department"; echo "</th>";
                    echo "</tr>";

                     

                    while ($row = mysqli_fetch_assoc($q)) 
                    {
                        echo "<tr>";
                            echo "<td>"; echo $row['book_id']; echo "</td>";
                            echo "<td>"; echo $row['title']; echo "</td>";
                            echo "<td>"; echo $row['authors']; echo "</td>";
                            echo "<td>"; echo $row['ISBN']; echo "</td>";
                            echo "<td>"; echo $row['status']; echo "</td>";
                            echo "<td>"; echo $row['quantity']; echo "</td>";
                            echo "<td>"; echo $row['department']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }  /*--- if the botton is not engaged--- */
            else
            {
                $res = mysqli_query($db, "SELECT * FROM `books`ORDER BY `books`.`title` ASC;");
                //<!-- while ($row = mysqli_fetch_assoc($res)) { //
                // Table header
                echo "<table class='table table-bordered table-hover'>";
                echo "<tr style='background-color: #d1baba; color: white;'>";
                      echo "<th>"; echo "Book ID"; echo "</th>";
                      echo "<th>"; echo "Title"; echo "</th>";
                      echo "<th>"; echo "Author Name"; echo "</th>";
                      echo "<th>"; echo "ISBN"; echo "</th>";
                      echo "<th>"; echo "Status"; echo "</th>";
                      echo "<th>"; echo "Quantity"; echo "</th>"; 
                      echo "<th>"; echo "Department"; echo "</th>";
                 
                  echo "</tr>";

                  
                  while ($row = mysqli_fetch_assoc($res)) {
                      echo "<tr>";
                      echo "<td>"; echo $row['book_id']; echo "</td>";
                      echo "<td>"; echo $row['title']; echo "</td>";
                      echo "<td>"; echo $row['authors']; echo "</td>";
                      echo "<td>"; echo $row['ISBN']; echo "</td>";
                      echo "<td>"; echo $row['status']; echo "</td>";
                      echo "<td>"; echo $row['quantity']; echo "</td>";
                      echo "<td>"; echo $row['department']; echo "</td>";
                      echo "</tr>";
                  }
                  echo "</table>";

            }
            if (isset($_POST['submit1'])) 
            {
                if(isset($_SESSION['login_user']))
                {
                    mysqli_query($db,"DELETE FROM books WHERE book_id='$_POST[book_id]';")
                    or die(mysqli_error($db));
                ?>
                <script type="text/javascript">
                  alert("Book Deleted successfully");
                  </script>"

                <?php
                }
                else
                {
                    ?>
                    <script type="text/javascript">
                    alert('Please login to Delete books.');
                    </script>";
                
                    <?php
                }
            }
            if (isset($_POST['submit_edit'])) 
            {
                $editBookId = $_POST['edit_book_id'];
                // Redirect to edit.php with the book ID
                echo "<script>window.location.href='edit.php?id={$editBookId}';</script>";
            }         
            

            
        ?>
</div>
</body>
</html>