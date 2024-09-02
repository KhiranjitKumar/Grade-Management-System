<?php

require 'config.php';


if (isset($_POST['year'], $_POST['semester'])) {
    $year = $_POST['year'];
    $semester = $_POST['semester'];

   
    $query = "SELECT course_id, course_name FROM Course_info
              WHERE course_id IN (
                  SELECT course_id FROM Course_offerings
                  WHERE year = $year AND semester = '$semester'
              )";

    $result = $conn->query($query);

    if ($result) {
        echo '<h2>Courses for Year ' . $year . ' Semester ' . $semester . '</h2>';
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . $row['course_id'] . ' - ' . $row['course_name'] . ' <button class="check-grades-btn btn btn-primary" data-course-id="' . $row['course_id'] . '">Check Grades</button></li>';
        }
        echo '</ul>';
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Year and semester not provided.";
}
?>
