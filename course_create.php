<?php
error_reporting(0);
require_once("config.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    
    $insert_course_info_query = "INSERT INTO course_info (course_id, course_name) VALUES ('$course_id', '$course_name')";

    if (mysqli_query($conn, $insert_course_info_query)) {
        
        $insert_course_offerings_query = "INSERT INTO course_offerings (course_id, year, semester) VALUES ('$course_id', '$year', '$semester')";

        if (mysqli_query($conn, $insert_course_offerings_query)) {
            echo "Course added successfully.";
        } else {
            echo "Error adding course to course_offerings: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding course to course_info: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="">

	<title>Register Form</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>

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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	

	<title>Register Form</title>
</head>

<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="course_id" placeholder="course_id" name="course_id" value="<?php echo $courseid; ?>" required>
			</div>
			<div class="input-group">
				<input type="course_name" placeholder=course_name" name="course_name" value="<?php echo $coursename; ?>" required>
			</div>
			<div class="input-group">
				<input type="year" placeholder="year" name="year" value="<?php echo $year ; ?>" required>
			</div>
			<div class="input-group">
				<input type="semester" placeholder="semester" name="semester" value="<?php echo $semester; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
            <a href="admincourseview.php" class="">Delete a course</a>
			<a href="uploadcourse_csv.php" class="">Upload bulk courses</a>

		</form>
	</div>
</body>

</html>