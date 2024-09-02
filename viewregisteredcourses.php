<?php
session_start();

if (!isset($_SESSION['rollno'])) {
    header("Location: index.php");
}

include("config.php");


$rollno = $_SESSION['rollno'];


$query = "SELECT ce.course_id, ci.course_name
          FROM course_enrollments ce
          JOIN course_info ci ON ce.course_id = ci.course_id
          WHERE ce.rollno = '$rollno'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style2.css">

    <meta charset="UTF-8">
    <title>View Registered Courses</title>
</head>
<body>
    <div class="x">
<a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>
   <a href="student_courses.php" class="btn btn-success btn-large text-align=center">Enroll to Courses</a>
   <a href="student_grade.php" class="btn btn-success btn-large text-align=center">View Grades</a>
   <a href="viewregisteredcourses.php" class="btn btn-success btn-large text-align=center">View registered courses</a>
    <h2>Registered Courses</h2>
    </div>

    <table  class="table table-bordered">
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['course_id'] . "</td>";
            echo "<td>" . $row['course_name'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    

</body>
</html>
