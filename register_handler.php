<?php
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$department = $_POST['department'];
$position = $_POST['position'];
$debate_types = $_POST['debate_types'];
$profile_pic = 'default.jpg'; // Placeholder image

$stmt = $conn->prepare("INSERT INTO users (name, email, password, department, position, debate_types, profile_pic) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $password, $department, $position, $debate_types, $profile_pic);

if ($stmt->execute()) {
  echo "✅ Registration successful. <a href='profile.php'>Go to Profile</a>";
} else {
  echo "❌ Error: " . $stmt->error;
}
?>
