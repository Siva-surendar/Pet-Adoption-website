<?php
// Start the session
session_start();

// Include database connection
$connection = mysqli_connect("localhost", "root", "", "pet_adoption");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables and error messages
$new_password = $confirm_password = "";
$errors = [];

// Check if the user is redirected here after OTP verification
if (!isset($_SESSION['email'])) {
    header("Location: ForgotPassword.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $new_password = isset($_POST['new_password']) ? trim($_POST['new_password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validate inputs
    if (empty($new_password)) {
        $errors['new_password'] = "New password is required.";
    } elseif (strlen($new_password) < 8) {
        $errors['new_password'] = "Password must be at least 8 characters long.";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Confirm password is required.";
    } elseif ($new_password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    // If there are no errors, update the password in the database
    if (empty($errors)) {
        $email = $_SESSION['email'];
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $query = "UPDATE users SET password = '$hashed_password' WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result) {
            // Password updated successfully, set session variable to show success message
            $_SESSION['password_reset_success'] = true;
            session_unset();
            session_destroy();
            header("Location: Login.php");
            exit;
        } else {
            $errors['database'] = "Failed to update password. Please try again.";
        }
    }
}

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="Login2.css">
  <script>
    // Display an alert if the password reset was successful
    <?php if (isset($_SESSION['password_reset_success'])): ?>
      alert('Password reset successfully! Please login with your new password.');
      <?php unset($_SESSION['password_reset_success']); ?>
    <?php endif; ?>
  </script>
</head>
<body>
  <div class="login-container">
    <div class="login-illustration">
      <img src="images/login_png.png" alt="Reset Password Illustration">
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="images/crystal_delta.png" alt="Crystal Delta Logo">
      </div>
      <h2>Reset Password</h2>
      <form action="reset_password.php" method="post">
        <div class="input-group <?php echo isset($errors['new_password']) ? 'error' : ''; ?>">
          <label for="new_password">New Password</label>
          <input type="password" name="new_password" id="new_password">
          <?php if (isset($errors['new_password'])): ?>
            <div class="error"><?php echo $errors['new_password']; ?></div>
          <?php endif; ?>
        </div>

        <div class="input-group <?php echo isset($errors['confirm_password']) ? 'error' : ''; ?>">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" id="confirm_password">
          <?php if (isset($errors['confirm_password'])): ?>
            <div class="error"><?php echo $errors['confirm_password']; ?></div>
          <?php endif; ?>
        </div>

        <?php if (isset($errors['database'])): ?>
          <div class="error"><?php echo $errors['database']; ?></div>
        <?php endif; ?>

        <button type="submit">Reset Password</button>
      </form>
      <p class="register">
        Remembered your password? <a href="Login.php">Login</a>
      </p>
    </div>
  </div>
</body>
</html>
