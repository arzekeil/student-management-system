<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '1@321uios';
const DBNAME = 'student';
$conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

if ($conn->connect_error) {
  die("connect error: " . $conn->connect_error);
}

?>