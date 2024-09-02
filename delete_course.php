<?php
include("config.php");

if (isset($_POST['courseId'])) {
    $courseId = $_POST['courseId'];

    
    $deleteCourseOfferingQuery = "DELETE FROM course_offerings WHERE course_id = '$courseId'";
    if (mysqli_query($conn, $deleteCourseOfferingQuery)) {
        
        $message = "Course ID $courseId has been deleted from successfully.";
        
        
        $deleteCourseInfoQuery = "DELETE FROM course_info WHERE course_id = '$courseId'";
        if (mysqli_query($conn, $deleteCourseInfoQuery)) {
            
            $message .= "";
        } else {
            
            $message = "Error deleting course from course_info: " . mysqli_error($conn);
        }
    } else {
        
        $message = "Error deleting course from course_offerings: " . mysqli_error($conn);
    }

    echo $message;
    mysqli_close($conn);
}
?>
