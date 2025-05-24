<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
  header("Location: profile.php");
  exit;
}

$id = $_SESSION['user']['id'];
$conn->query("DELETE FROM users WHERE id = $id");
session_destroy();
header("Location: index.php");
exit;
?>
