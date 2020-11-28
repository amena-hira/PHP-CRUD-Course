<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="table-responsive container mt-5 pt-5">
      <h3 class="text-center pb-3">Proposal Course from Student</h3>
      <a href="give_course.php" class="btn btn-primary float-right mb-3 ml-3">New Proposal</a>
      <a href="teacher.php" class="btn btn-secondary float-right mb-3 ml-3 ">Back</a>
      <a href="index.php" class="btn btn-warning float-right mb-3 ">Home</a>
    <table class="table table-bordered text-center">
        <caption>List of users</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Course ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Section</th>
            <th scope="col">Action</th>

          </tr>
        </thead>

        <?php
        include "connect.php";

        $result=mysqli_query($conn,"SELECT students.id, students.student_id,students.student_name,students.course_id,students.section,courses.course_name  FROM students LEFT JOIN teacher ON students.student_id = teacher.students_id JOIN courses ON students.course_id=courses.course_id WHERE teacher.students_id is NULL ");



        $id=1;

        while ($row = mysqli_fetch_array($result)) {
          $course_Id=$row['course_id'];

          $course_result=mysqli_query($conn,"SELECT * FROM courses where course_id = ('$course_Id')");
          echo "<tbody> <tr>";

          echo "<th>".$id."</th>";
          echo "<td>".$row['student_id']."</td>";
          echo "<td>".$row['student_name']."</td>";
          echo "<td>".$row['course_id']."</td>";
          echo "<td>".$row['course_name']."</td>";
          echo "<td>".$row['section']."</td>";
          ?>
          <td> <a href="edit_proposal_course.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Go</a> </td>

          <?php
          echo " </tr> </tbody>";
          $id++;

        }
        ?>

      </table>



    </div>
  </body>
</html>
