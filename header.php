<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LUDC</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container navbar">
      <div class="logo-area">
        <img src="images/logo.png" alt="LUDC Logo" class="logo" />
        <span class="brand-title">LUDC</span>
      </div>
      <nav class="nav-links" id="navLinks">
        <a href="index.php">Home</a>
        <a href="gallery.php">Gallery</a>
        <a href="committee.php">Committee</a>
        <a href="materials.php">Course Materials</a>
        <a href="contact.php">Events</a>
        <a href="ranking.php">Rankings</a>
        <a href="profile.php">Profile</a>
      </nav>
      <div class="hamburger" onclick="toggleMenu()">☰</div>
    </div>
  </header> <!-- ✅ This line fixes the gap -->

  <script>
    function toggleMenu() {
      document.getElementById('navLinks').classList.toggle('active');
    }
  </script>

  <main class="main-content">
