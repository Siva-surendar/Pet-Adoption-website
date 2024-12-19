<?php
// Start the session
session_start();

// Initialize variables and error messages
$entered_otp = "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize the OTP input
    $entered_otp = isset($_POST['otp']) ? trim($_POST['otp']) : '';

    // Validate OTP
    if (empty($entered_otp)) {
        $errors['otp'] = "OTP is required.";
    } elseif (!is_numeric($entered_otp)) {
        $errors['otp'] = "OTP must be a numeric value.";
    } elseif ($entered_otp != $_SESSION['otp']) {
        $errors['otp'] = "Invalid OTP.";
    } else {
        // OTP is valid, redirect to password reset page
        header("Location: reset_password.php");  // Redirect to password reset page
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify OTP</title>
  <link rel="stylesheet" href="Login2.css">
</head>
<body>
  <div class="login-container">
    <div class="login-illustration">
      <img src="images/login_png.png" alt="Verify OTP Illustration">
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="images/crystal_delta.png" alt="Crystal Delta Logo">
      </div>
      <h2>Verify OTP</h2>
      <form action="verify_otp.php" method="post">
        <div class="input-group <?php echo isset($errors['otp']) ? 'error' : ''; ?>">
          <label for="otp">Enter OTP</label>
          <input type="text" name="otp" id="otp" value="<?php echo htmlspecialchars($entered_otp); ?>" >
          <?php if (isset($errors['otp'])): ?>
            <div class="error"><?php echo $errors['otp']; ?></div>
          <?php endif; ?>
        </div>
        <button type="submit">Verify OTP</button>
      </form>
      <p class="register">
        Didn't receive the OTP? <a href="ForgotPassword.php">Resend OTP</a>
      </p>
    </div>
  </div>
</body>
</html>
