<?php
include("connect.php");
// error_reporting(0);
session_start();
$subject_name = $_SESSION['subject'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
    <link rel="stylesheet" href="take.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,531&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Teko&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <span id="head-text" class="form-group">Dacon Attendance Portal </span>
    </nav>
    <?php
    if (isset($_POST['submit'])) {
        echo "<h4>Attendance Submitted!!</h4>";
    }
    ?>
    <section class="container">
        <div class="box" id="left">
            <div id="leftmid">
                <span>Subject : <br>

                    <?php
                    echo $subject_name;
                    ?>
                </span>
            </div>

        </div>
        <div class="box" id="mid">

            <label for="">Please Select date</label>
            <label for="student1">Student 1</label>

            <label for="student2">Student 2</label>

            <label for="student3">Student 3</label>

            <label for="student4">Student 4</label>

            <label for="student5">Student 5</label>

        </div>
        <div class="box" id="right">
            <form action="" method="POST">
                <input type="date" name="date" >
                <input type="number" name="student1" placeholder="0 or 1" >
                <input type="number" name="student2" placeholder="0 or 1" >
                <input type="number" name="student3" placeholder="0 or 1" >
                <input type="number" name="student4" placeholder="0 or 1" >
                <input type="number" name="student5" placeholder="0 or 1" >
                <div id="btndiv">

                    <button type="submit" name="submit" id="btn" value="Submit">Submit</button>

                    <button id="btn"><a href="logout.php">Logout</a></button>

                </div>

            </form>

        </div>


    </section>

    <?php

    if (isset($_POST['submit'])) {

        $date_attendance = $_POST["date"];
        $var = $subject_name;

        $student1_att = $_POST["student1"];
        $student2_att = $_POST["student2"];
        $student3_att = $_POST["student3"];
        $student4_att = $_POST["student4"];
        $student5_att = $_POST["student5"];


        $data = "INSERT INTO `$subject_name` ( `date`, `student1`, `student2`, `student3`, `student4`, `student5`) VALUES (  '$date_attendance', '$student1_att', '$student2_att', '$student3_att', '$student4_att', '$student5_att')";

        $save = mysqli_query($connection, $data);

        if ($save) {
            echo "Data has been Inserted ";
        }
    }
    mysqli_close($connection);
?>
</body>

</html>