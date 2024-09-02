<?php
include("config.php");
if (isset($_POST['rollno'])) {
    

    $rollno = $_POST['rollno'];

   
    $delete_query = "DELETE FROM student_info WHERE rollno = '$rollno'";

    if (mysqli_query($conn, $delete_query)) {
     
        echo "Student with roll number $rollno has been deleted successfully.";
    } else {
      
        echo "Error: " . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>
