

<!DOCTYPE html>
<html lang="en">

<head>
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
    <div class="container mt-5">
        
        <div id="change-grade-dialog" style="display: none;">
            <input type="hidden" id="student-id">
            <div class="form-group">
                <label for="new-grade">New Grade:</label>
                <input type="text" class="form-control" id="new-grade">
            </div>
            <button type="button" class="btn btn-primary" id="update-grade">Update Grade</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".change-grade-btn").click(function() {
                
                var studentId = $(this).data("student-id");

                
                $("#student-id").val(studentId);

                
                $("#change-grade-dialog").show();
            });

            
            $("#update-grade").click(function() {
                
                var newGrade = $("#new-grade").val();
                var studentId = $("#student-id").val();

                
                $.ajax({
                    type: "POST",
                    url: "update_grade.php", 
                    data: {
                        student_id: studentId,
                        new_grade: newGrade
                    },
                    success: function(response) {
                        if (response === "success") {
                           
                            
                            location.reload();

                            
                        } else {
                         
                            alert("Failed to update grade.");
                           
                        }
                    }
                });
            });
        });
        
    </script>
</body>

</html>

<?php
require 'config.php';

if (isset($_GET['course_id'])) {
    $courseId = filter_var($_GET['course_id'], FILTER_SANITIZE_STRING);

    if ($courseId === false) {
        echo "Invalid course ID.";
        exit;
    }

    
    $query = "SELECT si.rollno, si.name, cg.grade
              FROM Student_info si
              LEFT JOIN Course_grades cg ON si.rollno = cg.rollno
              WHERE cg.course_id = '$courseId'";

    $result = $conn->query($query);

    if ($result) {
        echo '<h2 style="text-align: center;">Student Grades for Selected Course</h2>';
        echo '<table style="border-collapse: collapse; width: 80%; margin: 0 auto;" border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="padding: 10px; text-align: center;">Roll Number</th>';
        echo '<th style="padding: 10px; text-align: center;">Student Name</th>';
        echo '<th style="padding: 10px; text-align: center;">Grade</th>';
        echo '<th style="padding: 10px; text-align: center;">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td style="padding: 10px; text-align: center;">' . $row['rollno'] . '</td>';
            echo '<td style="padding: 10px; text-align: center;">' . $row['name'] . '</td>';
            echo '<td style="padding: 10px; text-align: center;">' . $row['grade'] . '</td>';
            
            
            echo '<td style="padding: 10px; text-align: center;">';
            echo '<button class="change-grade-btn" data-student-id="' . $row['rollno'] . '">Change Grade</button>';
            echo '</td>';
            
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo "Error: " . $conn->error;
    }
    
    
    $letterGrades = [
        'AA', 'AB', 'BB', 'BC', 'CC', 'CD', 'DD', 'F'
    ];
    
    $summary = [];
    
    foreach ($letterGrades as $grade) {
        $gradeCount = 0;
        
        foreach ($result as $row) {
            if ($row['grade'] === $grade) {
                $gradeCount++;
            }
        }
        
        $summary[$grade] = $gradeCount;
    }
    
    echo '<h2 style="text-align: center;">Summary of Student Performance</h2>';
    echo '<table style="border-collapse: collapse; width: 80%; margin: 0 auto;" border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="padding: 10px; text-align: center;">Letter Grade</th>';
    echo '<th style="padding: 10px; text-align: center;">Number of Students</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($summary as $grade => $count) {
        echo '<tr>';
        echo '<td style="padding: 10px; text-align: center;">' . $grade . '</td>';
        echo '<td style="padding: 10px; text-align: center;">' . $count . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "Invalid course ID.";
}
?>

