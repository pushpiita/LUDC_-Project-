<?php
$conn = new mysqli("localhost", "root", "", "ludc");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
