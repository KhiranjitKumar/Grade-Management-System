<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>


    <title>Welcome</title>
</head>
<a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>

<body>
     
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



    <div class="welcome">
        <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>
    </div>
   <BR></BR>
    
   <!-- <div class="x">
   <a href="admin_courses.php" class="btn btn-success btn-large text-align=center">View Courses</a>
   <a href="admin_grade.php" class="btn btn-success btn-large text-align=center">View Grades</a>
   <a href="f_grades.php" class="btn btn-success btn-large text-align=center">F grades</a>
   <a href="register.php" class="btn btn-success btn-large text-align=center">Add student</a>
   <a href="course_create.php" class="btn btn-success btn-large text-align=center">Add Course</a>
   <a href="upload_gradescsv.php" class="btn btn-success btn-large text-align=center">Upload grades</a>
   
   </div> -->
</body>

</html>