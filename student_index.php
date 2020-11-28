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


        <h3 class="text-center pb-3">Course Confirmation Table</h3>
        <a href="student.php" class="btn btn-primary float-right mb-3 ml-3">New Proposal</a>
        <a href="index.php" class="btn btn-warning float-right mb-3 ">Home</a>


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


            <?php
            echo " </tr> </tbody>";
            $id++;

          }
          ?>

        </table>

    </div>
</body>
</html>
