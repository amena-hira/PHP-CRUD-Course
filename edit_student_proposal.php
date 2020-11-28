<?php
include_once 'connect.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE students set id='" . $_POST['id'] . "', student_id='" . $_POST['student_id'] . "', student_name='" . $_POST['student_name'] . "',section='" . $_POST['section'] . "',time_session='" . $_POST['time_session'] . "', course_id='" . $_POST['course_id'] . "' ,status='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'");
header( "Location: http://localhost:8080/php/student.php" );
}
$result=mysqli_query($conn,"SELECT students.id,students.student_id,students.student_name,courses.course_id,courses.course_name,students.section,students.time_session,students.status FROM students INNER JOIN courses ON students.course_id=courses.course_id and students.id='" . $_GET['id'] . "'");

$row= mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-5">
    <h3 class="text-center text-success pb-3"> Assign Course to Studdent </h3>
        <form action="" method="post">
        <div class="form-row">

          <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
          <input type="hidden" name="status" class="txtField" value="<?php echo $row['status']; ?>">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Student ID</label>
                <input type="text" name="student_id" class="form-control" id="inputEmail4" placeholder="Student ID" value="<?php echo $row['student_id']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Student Name</label>
                <input type="text" name="student_name" class="form-control" id="inputEmail4" placeholder="Student Name" value="<?php echo $row['student_name']; ?>">
            </div>


            <div class="form-group col-md-6">
                <label for="inputEmail4">Course</label>
                <select class="custom-select" name="course_id">
                    <?php
                    echo "<option value='". $row['course_id'] ."'>" .$row['course_name'] ."</option>"; ?>
                    <?php

                    $course_list = mysqli_query($conn,"SELECT * FROM courses");
                    if($course_list){
                      while ($course=mysqli_fetch_array($course_list)) {
                        if ($course['course_id'] != $row['course_id']) {
                          echo "<option value='". $course['course_id'] ."'>" .$course['course_name'] ."</option>";
                        }

                      }
                    } ?>


                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Section</label>
                <input type="text" name="section" class="form-control" id="inputEmail4" placeholder="Section" value="<?php echo $row['section']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Session</label>
                <input type="text" name="time_session" class="form-control" id="inputEmail4" placeholder="Session" value="<?php echo $row['time_session']; ?>">
            </div>
        </div>
        <button type="submit" name="save" class="btn btn-primary">Submit</button>
        <a href="student.php" class="btn btn-danger">Back</a>
        </form>



        </table>

    </div>
</body>
</html>
