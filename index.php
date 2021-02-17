<?php
$servername = "172.17.0.3";
$username = "root";
$password = "DockerRules";
$dbname = "Trucorp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. "<br> - Name: " . $row["nama"]. "<br> kantor " . $row["kantor"]. "<br> <br>";
  }
} else {
  echo "no results";
}
$conn->close();
?>