<!DOCTYPE html>
<?php
    
    include "connection.php";    
    include "navbar.php";

    // Generate math CAPTCHA when form is not submitted
    if (!isset($_POST['submit'])) {
        $_SESSION['captcha_num1'] = rand(1, 10);
        $_SESSION['captcha_num2'] = rand(1, 10);
    }
?>

<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
        section { width: 100%; height: 100vh; margin: -19px; }
        .student_area1 {
            height: 70%; width: 70%; background-color: rgb(70, 66, 63);
            margin: 30px auto; opacity: .9; color: white; padding: 30px;
            text-align: center; border-radius: 10px;
        }
        label { color: white; font-size: 20px; font-weight: 700; }
        input[type="radio"] { width: 25px; height: 25px; vertical-align: middle; margin-right: 10px; accent-color: yellow; }
        input[type="text"], input[type="password"] {
            font-size: 20px; padding: 12px; height: auto;
        }
        .btn-default {
            font-size: 18px; padding: 8px 20px; background-color: yellow;
            color: black; font-weight: bold; border: none; border-radius: 4px;
        }
        .btn-default:hover { background-color: orange; }
        .form-control::placeholder { font-size: 16px; font-style: italic; }
        .login_form { text-align: left; margin: 0 auto; width: 80%; }
    </style>
</head>

<body>

<section>
    <div class="login_pics">
        <br><br><br>
        <div class="student_area1">
            <h1 style="font-size: 60px; color: yellow;">GOSHEN ONLINE LIBRARY MANAGEMENT SYSTEM</h1><br>
            <h1 style="font-size: 50px; color: yellow;">User Login</h1>
            <form name="login" action="" method="post">
                <p style="padding-left: 10px; font-weight: 700; font-size: 30px; text-align: left">Login as:</p>
                <div style="text-align: left; padding-left: 20px;">
                    <input type="radio" name="user" id="admin" value="admin">
                    <label for="admin" style="font-size: 24px;">Admin</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="user" id="student" value="student">
                    <label for="student" style="font-size: 24px;">Student</label>
                </div>
                <br><br>
                <div class="login_form">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Enter username" required><br>

                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter password" required><br>

                    <label for="captcha">What is <?php echo $_SESSION['captcha_num1'] . " + " . $_SESSION['captcha_num2']; ?>?</label>
                    <input class="form-control" type="text" name="captcha" placeholder="Enter answer" required><br>

                    <input class="btn btn-default" type="submit" name="submit" value="Login">
                </div>
            </form>

            
        </div>

        <?php
            if (isset($_POST['submit'])) {
                $captcha_user = intval($_POST['captcha']);
                $captcha_correct = $_SESSION['captcha_num1'] + $_SESSION['captcha_num2'];

                if ($captcha_user !== $captcha_correct) {
                    echo "<div class='alert alert-danger' style='width: 50%; margin-left: 25%; background-color: #f8d7da; color: #842029;'>
                            <strong>Incorrect CAPTCHA answer.</strong>
                          </div>";
                    exit();
                }

                if ($_POST['user'] == 'admin') {
                    $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' AND password='$_POST[password]'") or die(mysqli_error($db));
                    $row = mysqli_fetch_assoc($res);
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                        echo "<div class='alert alert-danger' style='width: 50%; margin-left: 25%; background-color: #f8d7da; color: #842029;'>
                                <strong>The username and password doesn't match.</strong>
                              </div>";
                    } else {
                        $_SESSION['login_user'] = $_POST['username'];
                        $_SESSION['pic'] = $row['pic'];
                        echo "<script>window.location='admin/books.php'</script>";
                    }
                } elseif ($_POST['user'] == 'student') {
                    $res = mysqli_query($db, "SELECT * FROM `student` WHERE username='$_POST[username]' AND password='$_POST[password]'") or die(mysqli_error($db));
                    $row = mysqli_fetch_assoc($res);
                    $count = mysqli_num_rows($res);

                    if ($count == 0) {
                        echo "<div class='alert alert-danger' style='width: 50%; margin-left: 25%; background-color: #f8d7da; color: #842029;'>
                                <strong>The username and password doesn't match.</strong>
                              </div>";
                    } else {
                        $_SESSION['login_user'] = $_POST['username'];
                        echo "<script>window.location='student/books.php'</script>";
                    }
                }
            }
        ?>
    </div>
</section>

</body>
</html>
