<?php
    session_start();
    /*
    if(isset($_SESSION['login_user']))
    {
        header("location: profile.php");
    } */
?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Goshen online Library Management System
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        nav
{
    float: right;
    word-spacing: 25px;
    padding: 20px;
}
nav li
{
    display: inline-block;
}
    </style>

</head>

<body>


    
    <div class="container">
    <div class="checker">
        <header>
            <div class="logo">
                <img src="images/1.jpg" height="50" width="120">
                <h1 style="color: white;">GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
            </div>

   

            <?php
                if (isset($_SESSION['login_user']))
                    {
                        ?>
                        <nav>
                            <ul>
                                <li><a href="index.php">HOME-PAGE</a></li>
                                <li><a href="books.php">BOOKS</a></li>
                                <li><a href="logout.php">LOGOUT</a></li>
                                <li><a href="feedback.php">FEEDBACK</a></li>
                            </ul>
                        </nav>


                    <?php
                    }
                else
                {
                    ?>
                    <nav>
                        <ul>
                            <li><a href="index.php">HOME-PAGE</a></li>
                            <li><a href="books.php">BOOKS</a></li>
                            <li><a href="admin_login.php">LOGIN</a></li>
                            <li><a href="feedback.php">FEEDBACK</a></li>
                        </ul>
                    </nav>
                    <?php
                }
                    ?>
                           
                

            ?>
           
        </header>
        <section>
            <div class="sec_image">
                <br><br><br>
                <div class="open">
                    <br><br><br>
                    <h1 style="text-align: center; font-size: 35px;">WELCOME TO GOSHEN LIBRARY</h1><br><br>
                   

                </div>
            </div>
        </section>
        <footer>
            <p style="color: white; text-align: center;">&copy; 2025 Goshen Online Library Management System <br>
                Email: &nbsp; &nbsp;GoshenOLMS@gmil.com <br>
                Mobile: &nbsp; &nbsp;&nbsp; &nbsp;+44.......
            </p>
            <br>
            <p style="color: black; text-align: center;">...Reconnecting you to the world through books... </p>


        </footer>
    </div>

</body>

</html>