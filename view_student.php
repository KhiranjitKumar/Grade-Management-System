<?php
   include("config.php");
if (isset($_GET['course_id']) && isset($_GET['year']) && isset($_GET['semester'])) {
    $course_id = $_GET['course_id'];
    $year = $_GET['year'];
    $semester = $_GET['semester'];

 

    
    $query = "SELECT si.rollno, si.name
              FROM student_info si
              INNER JOIN course_enrollments ce ON si.rollno = ce.rollno
              WHERE ce.course_id = '$course_id' AND ce.year = '$year' AND ce.semester = '$semester'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<h2>Students Registered for Course $course_id (Year $year, Semester $semester)</h2>";
        echo "<div class='centered-table'>";
        echo "<table>";
        echo "<tr><th>Roll Number</th><th>Name</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['rollno'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo '<a href="admin_courses.php" class="">Go Back</a>';
        echo "</div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);
} else {
    echo "Invalid parameters.";
}
?>
