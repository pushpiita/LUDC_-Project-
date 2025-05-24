<?php include 'header.php'; ?>
<div class="container">
  <h2>Register</h2>
 <form method="POST" action="register_handler.php">
  <input type="text" name="name" placeholder="Full Name" pattern="[A-Za-z\s]{3,50}" title="Name must be letters only, 3-50 characters" required><br>

  <input type="email" name="email" placeholder="Email" required><br>

  <input type="password" name="password" placeholder="Password" 
         pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" 
         title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" required><br>

  <input type="text" name="department" placeholder="Department" required><br>

  <input type="text" name="position" placeholder="Preferred Speaking Position" pattern="[A-Za-z\s]{2,30}" required><br>

  <input type="text" name="debate_types" placeholder="Types of Debate (e.g., BP, AP)" required><br>

  <button type="submit">Register</button>
</form>

</div>
<?php include 'footer.php'; ?>
