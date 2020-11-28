<?php

include 'connect.php';
if(isset($_POST['save']))
{
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];

    $sql = "INSERT INTO courses (course_id, course_name)
    VALUES ('$course_id','$course_name')";
    if (mysqli_query($conn, $sql)) {
      header( "Location: http://localhost:8080/php/course.php" );
    } else {
    echo "Error: " . $sql . " " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
