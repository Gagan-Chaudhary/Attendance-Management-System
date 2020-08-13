<?php
    include('connect.php');
    session_start();
    $choice=

    if (isset($_POST['start'])) {
        $start = $conn->real_escape_string($_POST['start']);
        
        $allData = "";
        $sql = $conn->query("SELECT * FROM country LIMIT $start, 50");
        while($data = $sql->fetch_assoc())
            $allData .= $data['id'] . ',' . $data['name'] . ',' . $data['countryCode'] . "\n";

        exit(json_encode(array("data" => $allData)));
    }

    $sql = $conn->query("SELECT id FROM country");
    $numRows = $sql->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export To CSV</title>
</head>
<body>
    <p id="response">Please Wait...</p>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var data = "data:text/csv;charset=utf-8,ID,NAME,COUNTRY CODE\n";

        $(document).ready(function () {
            exportToCSV(0, <?php echo $numRows ?>);
        });

        function exportToCSV(start, max) {
            if (start > max) {
                $("#response").html('<a href="'+data+'" download="countryTable.csv">Download</a>');
                return;
            }

            $.ajax({
                url: 'index.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    start: start
                }, success: function (response) {
                    data += response.data;
                    exportToCSV((start + 50), max);
                }
            });
        }
    </script>
</body>
</html>
