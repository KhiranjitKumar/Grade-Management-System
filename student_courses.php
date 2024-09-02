<?php
require_once("config.php");
session_start();

if (!isset($_SESSION['rollno'])) {
    header("Location: login_student.php");
}

$student_rollno = $_SESSION['rollno'];
$year = $_SESSION['year'];
$semester = $_SESSION['semester'];


$query = "SELECT ci.course_id, ci.course_name 
          FROM course_info ci
          JOIN course_offerings co ON ci.course_id = co.course_id
          WHERE co.year = $year AND co.semester = '$semester'";

$result = mysqli_query($conn, $query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];

   
    $check_query = "SELECT * FROM course_enrollments WHERE rollno = '$student_rollno' AND course_id = '$course_id' AND year = $year AND semester = '$semester'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "You are already registered for this course in the current semester.";
    } else {
       
        $registration_query = "INSERT INTO course_enrollments (rollno, course_id, year, semester) VALUES ('$student_rollno', '$course_id', $year, '$semester')";
        if (mysqli_query($conn, $registration_query)) {
            echo "Course registration successful!";
        } else {
            echo "Error: " . $registration_query . "<br>" . mysqli_error($conn);
        }
    }
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

    <title></title>
    <a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>
</head>

<body>
    <div class="welcome">
        <?php echo "<h1>Register for courses " . $_SESSION['rollno'] . "</h1>"; ?>
    </div>
    <div class="x">
    <div class="x">
    
   <a href="student_courses.php" class="btn btn-success btn-large text-align=center">Enroll to Courses</a>
   <a href="student_grade.php" class="btn btn-success btn-large text-align=center">View Grades</a>
   <a href="viewregisteredcourses.php" class="btn btn-success btn-large text-align=center">View registered courses</a>
   
   </div>
    </div>
    <br></br>

    <div class="table">
        <form method="POST" action="">
            <table class="table table-bordered">
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Register</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['course_id']; ?></td>
                        <td><?php echo $row['course_name']; ?></td>
                        <td>
                            <button type="submit" name="course_id" value="<?php echo $row['course_id']; ?>" class="btn btn-success">Register</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>
    </div>
</body>

</html>
