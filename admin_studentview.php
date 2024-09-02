
<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}



error_reporting(0);?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin View Students</title>
    <a href="logout.php" class="btn btn-success btn-small ">LOG OUT</a>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Grade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <h2>Admin View Students</h2>

    
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

        <button type="submit" name="view_students">View Students</button>
    </form>

    <?php
    include("config.php");
    
    if (isset($_POST['view_students'])) {
        $selected_year = $_POST['year'];
        $selected_semester = $_POST['semester'];

        $query = "SELECT * FROM student_info WHERE year = '$selected_year' AND semester = '$selected_semester'";
        $result = mysqli_query($conn, $query);
        ?>
        
        <table>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['rollno'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo '<td><button onclick="deleteStudent(' . $row['rollno'] . ')">Delete</button></td>';
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
        function deleteStudent(rollno) {
            if (confirm("Are you sure you want to delete this student?")) {
                $.post("delete_student.php", { rollno: rollno }, function(data) {
                    
                    alert(data);
                    
                    location.reload();
                });
            }
        }
    </script>
</body>
</html>
