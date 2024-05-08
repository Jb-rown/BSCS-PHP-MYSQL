<?php
$servername = "localhost";
$username = "root";
$password = "*k7JBmskrs6";
$dbName = "bscs_record_system";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
