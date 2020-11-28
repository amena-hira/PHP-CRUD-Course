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
        <form action="insert_confirm_course.php" method="post">
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="inputEmail4">Student ID</label>
                <input type="text" name="students_id" class="form-control" id="inputEmail4" placeholder="Student ID">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Student Name</label>
                <input type="text" name="student_name" class="form-control" id="inputEmail4" placeholder="Student Name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Teacher Name</label>
                <input type="text" name="teacher_name" class="form-control" id="inputEmail4" placeholder="Teacher Name">
            </div>

            <div class="form-group col-md-6">
              <label for="inputEmail4">Course</label>
              <select class="custom-select" name='courses_id'>
                  <option value="" disabled selected>Open this select menu</option>

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
                <input type="text" name="section" class="form-control" id="inputEmail4" placeholder="Section">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Session</label>
                <input type="text" name="time_session" class="form-control" id="inputEmail4" placeholder="Session">
            </div>
        </div>
        <button type="submit"  name="save"class="btn btn-primary">Submit</button>
        <a href="proposal_Course.php" class="btn btn-info">Back</a>
        </form>

        <h3 class="text-center pb-3">Confirmation Table</h3>

        <?php
        include "connect.php";
        $result=mysqli_query($conn,"SELECT teacher.id,teacher.teacher_name,teacher.students_id,teacher.student_name,courses.course_id,courses.course_name,teacher.section,teacher.time_session FROM teacher INNER JOIN courses ON teacher.courses_id=courses.course_id");

        ?>

      <table class="table table-bordered text-center">
          <caption>List of users</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Teacer Name</th>
              <th scope="col">Student ID</th>
              <th scope="col">Student Name</th>
              <th scope="col">Course ID</th>
              <th scope="col">Course Name</th>
              <th scope="col">Section</th>
              <th scope="col">Session</th>
              <th scope="col">Action</th>


            </tr>
          </thead>

          <?php
          $id=1;
          while ($row = mysqli_fetch_array($result)) {


            echo "<tbody> <tr>";

            echo "<th>".$id."</th>";
            echo "<td>".$row['teacher_name']."</td>";
            echo "<td>".$row['students_id']."</td>";
            echo "<td>".$row['student_name']."</td>";
            echo "<td>".$row['course_id']."</td>";
            echo "<td>".$row['course_name']."</td>";
            echo "<td>".$row['section']."</td>";
            echo "<td>".$row['time_session']."</td>";?>

            <td> <a href="edit_confirmation_view.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Edit</a>
             <a href="delete_confirmation.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a>
           </td>
            <?php
            echo " </tr> </tbody>";
            $id++;

          }
          ?>

        </table>

    </div>
</body>
</html>
