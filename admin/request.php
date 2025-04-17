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
    <br>        
    <div class="container">
        <div class="srch">
            <form action="" name="form1"  method="POST">
                <input type="text" name="username" class="form-control" placeholder="Username" required><br>
                <input type="text" name="book_id" class="form-control" placeholder="Book ID" required><br>                              
                <button class="btn btn-default" type="submit" name="submit">Submit </button><br>
            </form>
        </div>


        <h3 style ="text-align: center;" >Book Request</h3><br>        
        
        <?php

        if (isset($_SESSION['login_user'])) 
        {
                $sql ="SELECT student.username,email,books.book_id,title,authors,ISBN,status FROM 
                student INNER JOIN issue_book ON student.username=issue_book.username INNER JOIN books 
                ON issue_book.book_id = books.book_id WHERE issue_book.approve='';";
                $res = mysqli_query($db, $sql) or die(mysqli_error($db));

                if (mysqli_num_rows($res) == 0) 
                {
                    echo "<h2><b>";
                    echo "Apologies! No pending request.";
                    echo "</b></h2>";
                }
                else
                {
                    echo "<table class='table table-bordered'>";
                    echo "<tr style='background-color:rgb(98, 173, 170);color: white;'>";
                    //Table header
                    echo "<th>"; echo "Student Username"; echo "</th>";
                    echo "<th>"; echo "Student Email"; echo "</th>";
                    echo "<th>"; echo "Book-ID"; echo "</th>";
                    echo "<th>"; echo "Title"; echo "</th>";
                    echo "<th>"; echo "Author"; echo "</th>";
                    echo "<th>"; echo "ISBN"; echo "</th>";
                    echo "<th>"; echo "Status"; echo "</th>";         
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($res)) 
                    {
                        echo "<tr  style='color: white;'>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['email']; echo "</td>";
                        echo "<td>"; echo $row['book_id']; echo "</td>";
                        echo "<td>"; echo $row['title']; echo "</td>";  
                        echo "<td>"; echo $row['authors']; echo "</td>";
                        echo "<td>"; echo $row['ISBN']; echo "</td>";
                        echo "<td>"; echo $row['status']; echo "</td>";              
                        echo "</tr>";
                    }
                    echo "</table>";
                    } 
                }
                else
                {
                    ?>
                    <br><br><br>
                    <h4 style ="text-align: center; color: yellow;" >Please login to view your request.</h4>
                  
                    <?php

                } 

                if (isset($_POST['submit']))
                 {
                    $_SESSION['name'] = $_POST['username'];
                    $_SESSION['book_id'] = $_POST['book_id'];                 
                 
                  ?>
                     <script type="text/javascript">
                         window.location = "approve.php";
                     </script>
                 <?php
                  
                }
                

                
    
    ?>
    </div>


</div>  
</body>
</html>