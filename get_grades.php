<?php
require 'config.php';

if (isset($_POST['course_id'])) {
    $courseId = filter_var($_POST['course_id'], FILTER_VALIDATE_INT);

    if ($courseId === false) {
        echo "Invalid data received.";
        exit;
    }

    $query = "SELECT si.rollno, si.name, cg.grade
              FROM Student_info si
              LEFT JOIN Course_grades cg ON si.rollno = cg.rollno
              WHERE cg.course_id = $courseId";

    $result = $conn->query($query);

    if ($result) {
        echo '<h2>Student Grades for Selected Course</h2>';
        echo '<table class="table table-bordered">';
        echo '<tr><th>Roll Number</th><th>Student Name</th><th>Grade</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['rollno'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['grade'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid data received.";
}
?>
