<?php
$servername = "localhost";
$username = "root";
$password = ""; // Default for WAMP
$dbname = "school_db";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tblstudentsdb LIMIT 8";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 30px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 {
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            background-color: #ffffff;
        }

        thead th {
            background-color: #337ab7;
            color: white;
            text-align: center;
        }

        tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #dff0d8;
            cursor: pointer;
        }

        td {
            vertical-align: middle !important;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Student Rankings</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Card</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Class</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['ID_Card']}</td>
                        <td>{$row['Firstname']}</td>
                        <td>{$row['Lastname']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['Address']}</td>
                        <td>{$row['class']}</td>
                        <td>{$row['student_rank']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No students found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php $conn->close(); ?>
