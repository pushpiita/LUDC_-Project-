<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user'])) {
  header("Location: profile.php");
  exit;
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $position = $_POST['position'];
  $debate_types = $_POST['debate_types'];

  $stmt = $conn->prepare("UPDATE users SET name=?, department=?, position=?, debate_types=? WHERE id=?");
  $stmt->bind_param("ssssi", $name, $department, $position, $debate_types, $user['id']);
  $stmt->execute();

  // Refresh session data
  $result = $conn->query("SELECT * FROM users WHERE id = " . $user['id']);
  $_SESSION['user'] = $result->fetch_assoc();

  header("Location: profile.php");
  exit;
}
?>

<?php include 'header.php'; ?>
<div class="container">
  <h2>Edit Profile</h2>
  <form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
    <input type="text" name="department" value="<?= htmlspecialchars($user['department']) ?>" required><br>
    <input type="text" name="position" value="<?= htmlspecialchars($user['position']) ?>" required><br>
    <input type="text" name="debate_types" value="<?= htmlspecialchars($user['debate_types']) ?>" required><br>
    <button type="submit">Update</button>
  </form>
</div>
<?php include 'footer.php'; ?>
