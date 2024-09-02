<?php

session_start();

if (!isset($_SESSION['rollno'])) {
    header("Location: login_student.php");
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


    <title>Welcome</title>
</head>
<a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>

<body>
     




    <div class="welcome">
        <?php echo "<h1>Welcome " . $_SESSION['rollno'] . "</h1>"; ?>
    </div>
   <BR></BR>
    
   <div class="x">
   <a href="student_courses.php" class="btn btn-success btn-large text-align=center">Enroll to Courses</a>
   <a href="student_grade.php" class="btn btn-success btn-large text-align=center">View Grades</a>
   <a href="viewregisteredcourses.php" class="btn btn-success btn-large text-align=center">View registered courses</a>
   
   </div>
</body>

</html>