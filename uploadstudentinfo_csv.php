<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['csv_file'])) {
    $csv_file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($csv_file, "r")) !== false) {
        fgetcsv($handle);
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            
            if (count($data) == 5) {
                $rollno = $data[0];
                $name = $data[1];
                $rawPassword = $data[2]; 
                $year = $data[3];
                $semester = $data[4];

                
                $rollno = mysqli_real_escape_string($conn, $rollno);
                $name = mysqli_real_escape_string($conn, $name);
                $year = mysqli_real_escape_string($conn, $year);
                $semester = mysqli_real_escape_string($conn, $semester);

                
                $hashedPassword = md5($rawPassword);

                $insert_student_info_query = "INSERT INTO student_info (rollno, name, password, year, semester) 
                                             VALUES ('$rollno', '$name', '$hashedPassword', '$year', '$semester')";

                if (mysqli_query($conn, $insert_student_info_query)) {
                    //
                } else {
                    echo "Error adding student data: " . mysqli_error($conn);
                }
            } else {
                echo "CSV row does not contain the expected number of columns.";
            }
        }

        fclose($handle);
        echo "CSV data uploaded and processed successfully.";
    } else {
        echo "Error reading the CSV file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Upload Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Grade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>
    
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
</head>
<body>
    <div>
        <h2>Upload CSV File</h2>
        <form action="uploadstudentinfo_csv.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="csv_file" accept=".csv" required>
            <button type="submit">Upload CSV</button>
        </form>
    </div>
</body>
</html>
