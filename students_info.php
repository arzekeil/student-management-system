<?php
function connectDatabase() 
{
  return mysqli_connect("localhost", "root", "1@321uios", "student");
}

function editRecord($servername, $username, $password, $dbname, $studentID)
{
  $conn = connectDatabase();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM student_info WHERE id=$studentID";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css?php echo time(); ?>">
  <title>Student Management System</title>
</head>

<body>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="students_info.php">Student Information</a></li>
    <li><a href="course_info.php">Course Information</a></li>
  </ul>
  <h1>Student Mangement System</h1>
  <div>
    <table>
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Actions</th>
      <?php
      $conn = connectDatabase();

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM student_info";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>" .
            "<td>" . $row["student_id"] . "</td>" .
            "<td>" . $row["student_full_name"] . "</td>" .
            "<td>" .
            "<a href=delete.php?studentID=" . base64_encode($row["student_id"]) . ">Edit</a>" .
            " | " .
            "<a href=delete.php?studentID=" . base64_encode($row["student_id"]) . ">Delete</a>" .
            "</td>" .
            "</tr>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </table>
  </div>
</body>

</html>