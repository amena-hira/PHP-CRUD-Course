<?php

include 'connect.php';
if(isset($_POST['save']))
{
  $students_id = $_POST['students_id'];
  $student_name = $_POST['student_name'];
  $teacher_name = $_POST['teacher_name'];
  $section = $_POST['section'];
  $time_session = $_POST['time_session'];
  $courses_id = $_POST['courses_id'];
  $sql = "INSERT INTO teacher (teacher_name,students_id, student_name,courses_id,section,time_session)
  VALUES ('$teacher_name','$students_id','$student_name','$courses_id','$section','$time_session')";


  if (mysqli_query($conn, $sql)) {
      $update_sql = mysqli_query($conn,"UPDATE students set id='" . $_POST['id'] . "', student_id='" . $_POST['students_id'] . "', student_name='" . $_POST['student_name'] . "',section='" . $_POST['section'] . "',time_session='" . $_POST['time_session'] . "', course_id='" . $_POST['courses_id'] . "' ,status='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'");

    header( "Location: http://localhost:8080/php/give_course.php" );
  } else {
  echo "Error: " . $sql . " " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
