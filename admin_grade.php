<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Course and Grades</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>



    <div class="container mt-5">
        <h1>Admin Course and Grades</h1>
        <form id="course-form">
            <div class="form-group">
                <label for="year">Year:</label>
                <select class="form-control" id="year" name="year">
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                    <option value="4">Year 4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <select class="form-control" id="semester" name="semester">
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary" id="list-courses">List Courses</button>
        </form>
    </div>
    
    <div class="container mt-5" id="course-list">
      
    </div>

    <script>
        $(document).ready(function() {
            $("#list-courses").click(function() {
                var year = $("#year").val();
                var semester = $("#semester").val();

                $.ajax({
                    type: "POST",
                    url: "get_courses.php",
                    data: {
                        year: year,
                        semester: semester
                    },
                    success: function(response) {
                        $("#course-list").html(response);
                    }
                });
            });

            $("#course-list").on("click", ".check-grades-btn", function() {
                var courseId = $(this).data("course-id");
                
                window.location.href = "display_grades.php?course_id=" + courseId;
            });
        });
    </script>
</body>
</html>
