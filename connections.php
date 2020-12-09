<?php

$servername = "localhost";
$username = "root";
$password = "12345678";
$db_name = "test_list";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
  /*echo "<font color='green'>Connected Succesfully!!</font><br>";*/
}

?>