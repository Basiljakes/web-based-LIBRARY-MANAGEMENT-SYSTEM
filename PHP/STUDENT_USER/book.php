<?php

   include "connection.php";
   include "navbar.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<body>
    <h2>List of Books</h2>
    

    <!--
    <style>
        table {
            width: 80%;
            margin-top: 20px;
            margin-left: 10%;
            border-collapse: collapse;
        }
        th, td {
            height: 50px;
            border: 1px solid black;
            padding: 15px;
            text-align: center;
        }
    </style>
    <table class="table table-bordered">
        <tr>
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Available</th>
        </tr>
        -->
        <?php
            $res = mysqli_query($db, "SELECT * FROM `books` ORDER BY `books`.`book_id` ASC;");
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>"; echo $row['book_id']; echo "</td>";
                echo "<td>"; echo $row['book_name']; echo "</td>";
                echo "<td>"; echo $row['author_name']; echo "</td>";
                echo "<td>"; echo $row['category']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; echo $row['available']; echo "</td>";
                echo "</tr>";
            }
        ?>
    
</body>
</html>
