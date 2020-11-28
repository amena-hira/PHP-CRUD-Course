<?php
include_once 'connect.php';
$sql = "DELETE FROM teacher WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header( "Location: http://localhost:8080/php/give_course.php" );
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
