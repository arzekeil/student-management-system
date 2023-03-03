<?php
$servername = "localhost";
$username = "root";
$password = "1@321uios";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table>" .
        "<th> Student ID </th>" .
        "<th> Full Name </th>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>" . 
            "<td>" . $row["student_id"] . "</td>" .
            "<td>" . $row["student_full_name"] . "</td>" .
         "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>