<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Failing Students</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style2.css">
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
    <h1>Students with F grades</h1>
    <form method="POST">
        <label for="year">Year:</label>
        <select name="year" id="year" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <label for "semester">Semester:</label>
        <select name="semester" id="semester" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
        <br>
        <input type="submit" value="Show Failing Students">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['year']) && isset($_POST['semester'])) {
        require_once("config.php");

        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $semester = mysqli_real_escape_string($conn, $_POST['semester']);

       
        $query = "SELECT ci.course_id, ci.course_name, sg.rollno, si.name
                  FROM course_info ci
                  JOIN course_offerings co ON ci.course_id = co.course_id
                  JOIN course_grades sg ON co.course_id = sg.course_id AND co.year = sg.year AND co.semester = sg.semester
                  JOIN student_info si ON sg.rollno = si.rollno
                  WHERE co.year = $year AND co.semester = '$semester' AND sg.grade = 'F'
                  ORDER BY ci.course_name, si.name, sg.rollno";

        $result = mysqli_query($conn, $query);

        if ($result) {
            $current_course = null;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['course_name'] !== $current_course) {
                    if ($current_course !== null) {
                        echo "</table>";
                    }
                    echo "<h2>F grades in  " . $row['course_name'] . "</h2>";
                    echo "<table>";
                    echo "<tr><th>Roll Number</th><th>Student Name</th></tr>";
                    $current_course = $row['course_name'];
                }
                echo "<tr><td>" . $row['rollno'] . "</td><td>" . $row['name'] . "</td></tr>";
            }

            if ($current_course !== null) {
                echo "</table>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>

</html>
