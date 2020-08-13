<?php
include("connect.php");
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Teko&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <span id="head-text" class="form-group">Dacon Attendance Portal </span>
    </nav>
    <section id="login">

        <span id="form-text" class="form-group">Login </span>
        <form action="" id="form" method="POST">
            <div class="form-group">
                <i class="fa fa-user icon"></i>
                <input type="text" name="id" placeholder="ID">
            </div>
            <div class="form-group">
                <i class="fa fa-key icon"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <?php
            if ($_POST) {
                $userid = $_POST['id'];
                $password = $_POST['password'];

                $query1 = "SELECT * FROM faculty where id='$userid' and password='$password'";

                $result = mysqli_query($connection, $query1);
                if (mysqli_num_rows($result) == 1) {

                    $_SESSION['ams'] = 'true';

                    $_SESSION['user_id'] = $userid;
                    // echo $_SESSION['user_id'];
                    header('location:home.php');
                }
                $query2 = "SELECT * FROM student where id='$userid' and password='$password'";

                $result = mysqli_query($connection, $query2);
                if (mysqli_num_rows($result) == 1) {

                    $_SESSION['ams'] = 'true';

                    $_SESSION['user_id'] = $userid;
                    // echo $_SESSION['user_id'];
                    header('location:showstudent.php');
                } else {
                    echo "<h4>Wrong ID or password!!</h4>";
                }
            }

            ?>
            <div class="form-group">

                <button type="submit" class="btn">Login</button>
            </div>


        </form>
    </section>

</body>

</html>
