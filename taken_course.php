<?php

include 'connect.php';
if(isset($_POST['save']))
{
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $section = $_POST['section'];
    $time_session = $_POST['time_session'];
    $course_id = $_POST['course_id'];
    $sql = "INSERT INTO students (student_id, student_name,section,time_session,course_id,status)
    VALUES ('$student_id','$student_name','$section','$time_session','$course_id','')";
    if (mysqli_query($conn, $sql)) {
      header( "Location: http://localhost:8080/php/student.php" );
    } else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
