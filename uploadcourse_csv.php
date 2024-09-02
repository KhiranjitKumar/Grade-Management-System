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
            if (count($data) >= 4) {
                $course_id = $data[0];
                $course_name = $data[1];
                $year = $data[2];
                $semester = $data[3];

                
                $insert_course_info_query = "INSERT INTO course_info (course_id, course_name) VALUES ('$course_id', '$course_name')";

                if (mysqli_query($conn, $insert_course_info_query)) {
                    
                    $insert_course_offerings_query = "INSERT INTO course_offerings (course_id, year, semester) VALUES ('$course_id', '$year', '$semester')";

                    if (!mysqli_query($conn, $insert_course_offerings_query)) {
                        echo "Error adding course to course_offerings: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error adding course to course_info: " . mysqli_error($conn);
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
        <form action="uploadcourse_csv.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="csv_file" accept=".csv" required>
            <button type="submit">Upload CSV</button>
        </form>
    </div>
</body>
</html>

