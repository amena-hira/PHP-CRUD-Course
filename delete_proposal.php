<?php
include_once 'connect.php';
$sql = "DELETE FROM students WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Location: http://localhost:8080/php/student.php" );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
