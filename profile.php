<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      header("Location: profile.php");
      exit;
    } else {
      $error = "❌ Incorrect password.";
    }
  } else {
    $error = "❌ No user found.";
  }
}
?>

<?php include 'header.php'; ?>
<div class="container">
  <?php if (isset($_SESSION['user'])): 
    $u = $_SESSION['user']; ?>
    
    <h2>Welcome, <?= htmlspecialchars($u['name']) ?></h2>
    <img src="images/president.jpg?? 'default.jpg') ?>" alt="Profile Picture"
         style="width:150px; height:150px; border-radius:50%; object-fit:cover; border:3px solid #00aaff;"><br><br>

    <p><strong>Email:</strong> <?= htmlspecialchars($u['email']) ?></p>
    <p><strong>Department:</strong> <?= htmlspecialchars($u['department']) ?></p>
    <p><strong>Preferred Position:</strong> <?= htmlspecialchars($u['position']) ?></p>
    <p><strong>Debate Types:</strong> <?= htmlspecialchars($u['debate_types']) ?></p>

   <div class="button-group">
  <a href="edit_profile.php" class="btn-like">✏️ Edit Profile</a>
  <a href="delete_account.php" class="btn-like" onclick="return confirm('Are you sure you want to delete your account?')">🗑 Delete Account</a>
  <a href="logout.php" class="btn-like logout">Logout</a>
</div>


  <?php else: ?>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Email" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <button type="submit">Login</button>
    </form>
    <p style="margin-top: 1em;">
      Don't have an account? <a href="register.php">Register here</a>
    </p>
  <?php endif; ?>
</div>
<?php include 'footer.php'; ?>
