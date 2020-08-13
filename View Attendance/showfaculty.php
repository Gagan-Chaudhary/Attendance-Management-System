<?php
include("connect.php");
session_start();
$subject = $_SESSION['subject'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="showfaculty.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Teko&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <span id="head-text" class="form-group">Dacon Attendance Portal </span>
    </nav>
    <table>
        <tr>
            <th>Date</th>
            <th>Student1</th>
            <th>Student2</th>
            <th>Student3</th>
            <th>Student4</th>
            <th>Student5</th>
        </tr>
        <?php

        $sql = "SELECT *  FROM `" . $subject . "`";
        $data = mysqli_query($connection, $sql);
        $total = mysqli_num_rows($data);
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["date"] . "</td><td>" . $row["student1"] . "</td><td>" . $row["student2"] . "</td><td>" . $row["student3"] . "</td><td>" . $row["student4"] . "</td><td>" . $row["student5"] . "</td><td>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $connection->close();
        ?>
    </table>
    <form action="" method="POST">
        <div id="buttons">
            <button class="btn" type="submit" name="export"><a href="export.php">Export</a></button>

            <button class="btn"><a href="logout.php">Logout</a></button>

        </div>
    </form>
</body>

</html>