<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Student</title>
    <link rel="stylesheet" href="showstudent.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&family=Teko&display=swap" rel="stylesheet">
</head>

<body>
    <nav id="navbar">
        <span id="head-text" class="form-group">Dacon Attendance Portal </span>
    </nav>
    <?php
    include("connect.php");
    session_start();
    $id = $_SESSION['user_id'];

    $q1 = "SELECT * from student where id=$id";
    $d1 = mysqli_query($connection, $q1);
    $res = mysqli_fetch_assoc($d1);
    echo "<div class='details'><span id='stu_name'>Student ID : $id </span>" . "<span id='stu_name'>Student Name : " . $res['name'] . " </span></div>";
    $sub = array("DBMS", "WEB_TECH", "COA", "OS");

    foreach ($sub as $value) {
    ?>
        <div id="box">
            <?php
            $query = "SELECT * from `$value`";
            $data = mysqli_query($connection, $query);
            $total = mysqli_num_rows($data);
            echo "<span>Subject : $value</span>";
            if ($total != 0) {
            ?>
                <table>
                    <tr>
                        <td>Date</td>
                        <td>Attendance</td>
                    </tr>
                <?php
                $sum = 0;
      
                while ($result = mysqli_fetch_assoc($data)) {
                    echo    "<tr>
                        <td>" . $result['date'] . "</td>
                        <td>" . $result['student1'] . "</td>
                        
                        
                    </tr> ";
                    $sum += $result['student1'];
                }
                echo    "<tr id='''total'''>
        <td id='''total'''>" . "Total Attendance" . "</td>
        <td id='''total'''>" . $sum . "</td>
        
        
    </tr> ";
            } else {
                echo " Table do not have records";
            }

                ?>

                </table>
        </div>

    <?php
        // <h3> echo "Toal Attendance ",$sum;
        // // </h3>
        // echo "Total Attendance $sum";


    }
    ?>
    <div id="button">
        <button class="btn" onclick="window.location.href ='logout.php';">Logout</button>
    </div>


</body>

</html>