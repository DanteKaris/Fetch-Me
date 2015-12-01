<?php
$sever = "localhost";
$username = "root";
$password = "dante532461";
$database = "fetchMe";

//connect to databse
$conn = new mysqli($severname, $username, $password, $database);

//fetch data
$select = "SELECT * FROM users";
$results = $conn->query($select);

//output data
echo"<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";

while ($row = mysqli_fetch_assoc($results)) {
          echo"<tr><td>".$row['id']. "</td><td>".
              $row['first_name'] . " " .$row['last_name'] . "</td><td>" .
              $row['email'] . "</td></tr>";
}
echo "</table>";

mysqli_close($connect);
