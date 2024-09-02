<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['csv_file'])) {
    $csv_file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($csv_file, "r")) !== false) {
        fgetcsv($handle); 

        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            if (count($data) >= 5) {
                $rollno = $data[0];
                $course_id = $data[1];
                $year = $data[2];
                $semester = $data[3];
                $grade = $data[4];

                $insert_grade_query = "INSERT INTO course_grades (rollno, course_id, year, semester, grade) VALUES ('$rollno', '$course_id', '$year', '$semester', '$grade')";

                if (mysqli_query($conn, $insert_grade_query)) {
                    
                } else {
                    echo "Error adding data to course_grade: " . mysqli_error($conn);
                }
            }
        }

        fclose($handle);
        echo "CSV data uploaded and processed successfully.";
    } else {
        echo "Error reading the CSV file.";
    }
}
?>
