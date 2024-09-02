<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

error_reporting(0);

include 'config.php'; 

if (isset($_POST['submit'])) {
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    if ($password == $cpassword) {
        $sql = "SELECT * FROM student_info WHERE rollno='$rollno'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) { 
            $insertSql = "INSERT INTO student_info (rollno, name, password, year, semester)
                          VALUES ('$rollno', '$name', '$password', '$year', '$semester')";
            if (mysqli_query($conn, $insertSql)) {
                echo "<script>alert('Student added.')</script>";
            } else {
                echo "<script>alert('Woops! Something Went Wrong.')</script>";
            }
        } else {
            echo "<script>alert('Student Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
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

	
</head>

<body>
<!-- <div class="x">
   <a href="" class="btn btn-success btn-large text-align=center">View Courses</a>
   <a href="intschl.php" class="btn btn-success btn-large text-align=center">View Grades</a>
   <a href=".php" class="btn btn-success btn-large text-align=center">F grades</a>
   <a href="register.php" class="btn btn-success btn-large text-align=center">Add student</a>
   <a href="course_create.php" class="btn btn-success btn-large text-align=center">Add Course</a> -->
   
   </div>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="rollno" placeholder="Roll Number" name="rollno" value="<?php echo $rollno; ?>" required>
			</div>
			<div class="input-group">
				<input type="name" placeholder="Name" name="name" value="<?php echo $name; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<input type="year" placeholder="year" name="year" value="<?php echo $_POST['year']; ?>" required>
			</div>
			<div class="input-group">
				<input type="semester" placeholder="semester" name="semester" value="<?php echo $_POST['semester']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<a href="admin_studentview.php" class="">Delete Student</a>
			<a href="uploadstudentinfo_csv.php" class="">Upload csv</a>

		</form>
	</div>
</body>

</html>