
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resume"; // your database name
$port = "3307"; //default 3306

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
