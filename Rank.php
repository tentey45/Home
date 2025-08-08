<?php
$host = "localhost";
$user = "root";
$pass = ""; // your MySQL password
$db = "student_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$students_sql = "SELECT * FROM tblstudents LIMIT 1";
$students_result = $conn->query($students_sql);
?>


<!DOCTYPE html>
<html>
    <head>
    <title>The University</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .panel {
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
        }
        .panel-heading {
            font-size: 18px;
            font-weight: bold;
        }
        table {
            background-color: white;
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
        footer {
            margin-top: 40px;
            padding: 10px;
            background-color: #222;
            color: #fff;
        }
    </style>
</head>


<body>
<div class="container">
    <ul class="nav nav-pills">
        <li class="active"><a href="#">Dashboards</a></li>
        <li><a href="#">News Feed</a></li>
        <li><a href="dashboard.php">Students</a></li>
    </ul>

    <div class="well">You are in : Dashboard</div>

    <div class="panel panel-default">
        <div class="panel-heading"><b>Top Students</b> <span class="badge pull-right">Total: <?php echo $students_result->num_rows; ?></span></div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th><th>name</th><th>gender</th><th>class</th><th>student_rank</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while($row = $students_result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$i}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['class']}</td>
                            <td>{$row['student_rank']}</td>
                        </tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
                   



    <footer class="text-center">&copy; University 2025</footer>
</div>

</body>
</html>

<?php
$conn->close();
?>


