<?php
require 'db.php';
$email = $_GET['email'];
$token = $_GET['token'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND verification_token=?");
$stmt->bind_param("ss", $email, $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $update = $conn->prepare("UPDATE users SET is_verified=1, verification_token=NULL WHERE email=?");
    $update->bind_param("s", $email);
    $update->execute();
    echo "✅ Email verified. <a href='login.php'>Login here</a>";
} else {
    echo "Invalid verification link.";
}
?>
