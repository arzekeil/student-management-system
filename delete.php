<?php
require_once "db.php";
if (isset($_GET['studentID'])) {
  $studentID = base64_decode($_GET['studentID']);
  $sql = "DELETE FROM student_info WHERE student_id=$studentID";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  header('location: students_info.php');
}
else {
  header('location: students_info.php');
}
