<?php
 include "connection.php";
 include "navbar.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style type="text/css">
        body
        {
            background-image: url("images/feedback3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .wrapper
        {
            padding: 10px;
            margin: -20px auto;
            width: 60%;
            height: 450px;
            background-color: black;
            opacity: .8;
            color: white;
        }
        .form-control
        {
            height: 70px;
            width: 70%;
        }
        .scroll
        {
            width: 100%;
            height: 300px;
            overflow: auto;
        }
    </style>
        
     

</head>
<body>
    <div class= "wrapper">
        <h4>Feel free to share your suggestions or ask any questions in the comments below...</h4>
        <form style="" action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="Write something..."><br><br>
            <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 40px;">
        </form>
        <br><br>
    

     <div class="scroll">
        <?php
            if(isset($_POST['submit']))
            {
                $sql = "INSERT INTO `comments` VALUES('','$_POST[comment]');";
                if(mysqli_query($db, $sql))
                {
                    $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                    $res = mysqli_query($db, $q);
                    echo "<table class='table table-bordered'>";
                    while($row = mysqli_fetch_assoc($res))
                    {
                        echo "<tr>";
                        echo "<td>"; echo $row['comment']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            }
            else
            {
                $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                $res = mysqli_query($db, $q);
                echo "<table class='table table-bordered'>";
                while($row = mysqli_fetch_assoc($res))
                {
                    echo "<tr>";
                    echo "<td>"; echo $row['comment']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
      </div>



    </div>
    
</body>
</html>