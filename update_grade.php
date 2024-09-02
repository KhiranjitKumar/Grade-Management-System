<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $studentId = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_STRING);
    $newGrade = filter_input(INPUT_POST, 'new_grade', FILTER_SANITIZE_STRING);

    if ($studentId === false || $newGrade === false) {
        echo "Invalid data received.";
        exit;
    }

    
    $query = "UPDATE Course_grades SET grade = ? WHERE rollno = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $newGrade, $studentId);

    if ($stmt->execute()) {
        echo "success";
        
        
    } else {
        echo "Failed to update grade: " . $conn->error;
    }


    $stmt->close();
} else {
    echo "Invalid request method.";
}

?>
