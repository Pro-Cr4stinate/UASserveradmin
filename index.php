<?php
$servername = "172.17.0.2";
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
$count = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $count++;
    echo "id: " . $row["id"]. "<br> - Name: " . $row["nama"]. "<br> kantor " . $row["kantor"]. "<br> <br>";
  }
  echo "jumlah user dalam database adalah : " . $count;
} else {
  echo "no results";
}
$conn->close();
?>