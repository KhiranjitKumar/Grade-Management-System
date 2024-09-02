<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Course Registrations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .centered-table {
            text-align: center;
            margin: 0 auto;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid #888;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
<a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>
    <h1>Admin Course Registrations</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="admin_courses.php">View Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_grade.php">View Grades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="f_grades.php">F grades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Add Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="course_create.php">Add Course</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload_gradescsv.php">Upload Grades</a>
            </li>
        </ul>
    </div>
</nav>
   

<div class="container"> 
    <form method="POST">
        <label for="year">Year:</label>
        <select name="year" id="year" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <label for="semester">Semester:</label>
        <select name="semester" id="semester" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <br>
        <input type="submit" value="Show Registrations">
    </form>
</div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['year']) && isset($_POST['semester'])) {
        require_once("config.php");

        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $semester = mysqli_real_escape_string($conn, $_POST['semester']);

        $query = "SELECT ci.course_id, ci.course_name, COUNT(ce.rollno) AS registrations
                  FROM course_info ci
                  LEFT JOIN course_offerings co ON ci.course_id = co.course_id
                  LEFT JOIN course_enrollments ce ON co.course_id = ce.course_id AND co.year = ce.year AND co.semester = ce.semester
                  WHERE co.year = $year AND co.semester = '$semester'
                  GROUP BY ci.course_id, ci.course_name";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<h2>Course Registrations for Year $year, Semester $semester</h2>";
            echo "<div class='centered-table'>";
            echo "<table>";
            echo "<tr><th>Course ID</th><th>Course Name</th><th>Registrations</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_name'] . "</td>";
                echo "<td>" . $row['registrations'] . "</td>";
                echo '<td><a href="view_student.php?course_id=' . $row['course_id'] . '&year=' . $year . '&semester=' . $semester . '" class="btn btn-primary">View Students</a></td>';
                
                echo "</tr>";
            }

            echo "</table>";
            echo "</div>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>
