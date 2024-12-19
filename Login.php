<?php
// Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "pet_adoption");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables and error messages
$username = $password = "";
$errors = [];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validate inputs
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        // Query the database for the username
        $query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Redirect to home page on successful login
                header("Location: Home.php");
                exit;
            } else {
                $errors['password'] = "Password is incorrect.";
            }
        } else {
            $errors['username'] = "Username is incorrect.";
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
  <title>Login Page</title>
  <link rel="stylesheet" href="Login2.css">
</head>
<body>
  <div class="login-container">
    <div class="login-illustration">
      <img src="images/login_png.png" alt="Adopt Illustration">
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="images/crystal_delta.png" alt="Crystal Delta Logo">
      </div>
      <h2>Login</h2>
      <form action="Login.php" method="post">
        <div class="input-group <?php echo isset($errors['username']) ? 'error' : ''; ?>">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
          <?php if (isset($errors['username'])): ?>
            <div class="error"><?php echo $errors['username']; ?></div>
          <?php endif; ?>
        </div>
        <div class="input-group <?php echo isset($errors['password']) ? 'error' : ''; ?>">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <?php if (isset($errors['password'])): ?>
            <div class="error"><?php echo $errors['password']; ?></div>
          <?php endif; ?>
        </div>
        <button type="submit">Login</button>
      </form>
      <p class="register">
        Don't have an account? <a href="Register.php">Register</a>
      </p>
      <p class="forgot">
         <a href="ForgotUsername.php" >Forgot Username?</a>
         <a href="ForgotPassword.php" >Forgot Password?</a>
      </p>
    </div>
  </div>
</body>
</html>
