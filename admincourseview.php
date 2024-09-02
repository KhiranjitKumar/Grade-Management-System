<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin View Courses</title>
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
    <h2>Admin View Courses</h2>

    <form method="POST" action="">
        <label for="year">Select Year:</label>
        <select name="year" id="year">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <label for="semester">Select Semester:</label>
        <select name="semester" id="semester">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>

        <button type="submit" name="view_courses">View Courses</button>
    </form>

    <?php
    include("config.php");
    
    if (isset($_POST['view_courses'])) {
        $selected_year = $_POST['year'];
        $selected_semester = $_POST['semester'];

        $query = "SELECT course_offerings.course_id, course_info.course_name FROM course_offerings JOIN course_info ON course_offerings.course_id = course_info.course_id WHERE course_offerings.year = '$selected_year' AND course_offerings.semester = '$selected_semester'";
        $result = mysqli_query($conn, $query);
        ?>
        
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_name'] . "</td>";
                echo '<td><button onclick="deleteCourse(\'' . $row['course_id'] . '\')">Delete</button></td>';
                echo "</tr>";
            }
            ?>
        </table>
        <?php
        mysqli_close($conn);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function deleteCourse(courseId) {
            if (confirm("Are you sure you want to delete this course?")) {
                $.post("delete_course.php", { courseId: courseId }, function(data) {
                    alert(data);
                    location.reload();
                });
            }
        }
    </script>
</body>
</html>
