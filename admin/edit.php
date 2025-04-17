<?php
include "connection.php";
include "navbar.php";

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM books WHERE book_id='$book_id'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "<div class='alert alert-danger'>Book not found.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-warning'>No book selected for editing.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <h2>Edit Book</h2>
    <form action="" method="post">
        <div class="form-group">
            <label>Book ID</label>
            <input type="text" name="book_id" class="form-control" value="<?php echo htmlspecialchars($row['book_id']); ?>" readonly>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
        </div>
        <div class="form-group">
            <label>Authors</label>
            <input type="text" name="authors" class="form-control" value="<?php echo htmlspecialchars($row['authors']); ?>" required>
        </div>
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="ISBN" class="form-control" value="<?php echo htmlspecialchars($row['ISBN']); ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?php echo htmlspecialchars($row['status']); ?>" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" class="form-control" value="<?php echo htmlspecialchars($row['department']); ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Book</button>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $ISBN = $_POST['ISBN'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $department = $_POST['department'];

    $update_query = "UPDATE books SET 
        title='$title', 
        authors='$authors', 
        ISBN='$ISBN', 
        status='$status', 
        quantity='$quantity', 
        department='$department' 
        WHERE book_id='$book_id'";

    if (mysqli_query($db, $update_query)) {
        echo "<script>alert('Book updated successfully!'); window.location='books.php';</script>";
    } else {
        echo "<div class='alert alert-danger'>Failed to update book. Please try again.</div>";
    }
}
?>
</body>
</html>
