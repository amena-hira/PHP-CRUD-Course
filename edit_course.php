<?php
include_once 'connect.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE courses set id='" . $_POST['id'] . "', course_id='" . $_POST['course_id'] . "', course_name='" . $_POST['course_name'] . "' WHERE id='" . $_POST['id'] . "'");
header( "Location: http://localhost:8080/php/course.php" );
}
$result = mysqli_query($conn,"SELECT * FROM courses WHERE id='" . $_GET['id'] . "'");
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
    <div class="container  pt-5">
        <h3 class="text-center text-success pb-3"> Course Form </h3>
        <form method="post" action="">
          <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="courseId">Course ID</label>
                    <input type="text" name="course_id" class="form-control" id="courseId" placeholder="Course ID" value="<?php echo $row['course_id']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="courseName">Course Name</label>
                    <input type="text" name="course_name" class="form-control" id="courseName" placeholder="Course Name" value="<?php echo $row['course_name']; ?>">
                </div>


            </div>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
            <a href="course.php" class="btn btn-danger">Back</a>



        </form>
    </div>
</body>
</html>
