<?php
include_once 'connect.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE teacher set id='" . $_POST['id'] . "', teacher_name='" . $_POST['teacher_name'] . "', students_id='" . $_POST['students_id'] . "', student_name='" . $_POST['student_name'] . "' ,courses_id='" . $_POST['courses_id'] . "' ,section='" . $_POST['section'] . "' ,time_session='" . $_POST['time_session'] . "' WHERE id='" . $_POST['id'] . "'");
header( "Location: http://localhost:8080/php/give_course.php" );
}
$result=mysqli_query($conn,"SELECT * FROM teacher");
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
    <h3 class="text-center text-success pb-3"> Assign Course to Student </h3>
        <form action="" method="post">
          <input type="hidden" name="id"  value="<?php echo $row['id']; ?>">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputEmail4">Student ID</label>
                <input type="text" name="students_id" class="form-control" id="inputEmail4" placeholder="Student ID" value="<?php echo $row['students_id']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Student Name</label>
                <input type="text" name="student_name" class="form-control" id="inputEmail4" placeholder="Student Name" value="<?php echo $row['student_name']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Teacher Name</label>
                <input type="text" name="teacher_name" class="form-control" id="inputEmail4" placeholder="Teacher Name" value="<?php echo $row['teacher_name']; ?>">
            </div>

            <div class="form-group col-md-6">
              <label for="inputEmail4">Course</label>
              <select class="custom-select" name='courses_id'>

                  <?php
                  $course_Id=$row['courses_id'];
                  $course_result=mysqli_query($conn,"SELECT * FROM courses where course_id = ('$course_Id')");
                  while($data=$course_result -> fetch_assoc()){
                  echo "<option value='". $data['course_id'] ."'>" .$data['course_name'] ."</option>";
                  }?>


                  <?php
                  include "connect.php";
                  $result = mysqli_query($conn,"SELECT * FROM courses");
                  if($result){
                    while ($data=mysqli_fetch_array($result)) {
                      echo "<option value='". $data['course_id'] ."'>" .$data['course_name'] ."</option>";
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
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="give_course.php" class="btn btn-info">Back</a>
        </form>



    </div>
</body>
</html>
