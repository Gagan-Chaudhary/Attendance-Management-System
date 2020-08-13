<?php
include("connect.php");
session_start();
if (!$_SESSION['ams']) {
    header('location:login.php');
}

$namep = $_SESSION['user_id'];

$sql = "SELECT Name FROM faculty where id=$namep";
$pr = mysqli_query($connection, $sql);
$result = $connection->query($sql);

$dta = mysqli_fetch_assoc($pr);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Teko&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <span id="head-text" class="form-group">Dacon Attendance Portal </span>
    </nav>
    <Section id="main">
        <span id="wel">Welcome to Mr. <?php echo implode(" ", $dta); ?></span>
        <div>
            <form action="" method="post">
                <label for="subject">Please select the Subject</label><br>


                <select name="subject">

                    <option value="WEB_TECH">Web Technology</option>
                    <option value="DBMS">DBMS</option>
                    <option value="OS">Operating System</option>
                    <option value="COA">Computer Architecture</option>
                </select>
                <div>
                    <!-- <input type="submit" name="submit" value="Take Attendance"> -->
                    <button class="btn" type="submit" name="submit">Take Attendance</button>
                </div>
                <div>
                    <button class="btn"><a href="logout.php">Logout</a> </button>
                </div>
            </form>
        </div>
    </Section>
</body>

</html>


<?php

if (isset($_POST['submit'])) {

    $_SESSION['subject'] = $_POST['subject'];
    header('location:take.php');
}

?>