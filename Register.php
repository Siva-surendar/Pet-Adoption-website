<?php
// Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "pet_adoption");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables and error array
$username = $email = $password = $confirm_password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate inputs
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate username
    if (empty($username)) {
        $errors['username'] = "Username is required";
    }

    // Validate email
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    } else {
        // Check if the email is already registered
        $email_check_query = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connection, $email_check_query);
        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "You are already registered. Please log in.";
        }
    }

    // Validate password
    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long";
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Confirm password is required";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    // If there are no errors, proceed with database insertion
    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT); // Hash the password for security

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hashed')";

        if (mysqli_query($connection, $sql)) {
            // Redirect to login page on successful registration
            header("Location: Login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
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
  <title>Register Page</title>
  <link rel="stylesheet" href="Register.css">
</head>
<body>
  <div class="container">
    <div class="form-section">
      <div class="logo">
        <img src="images/crystal_delta.png" alt="Logo">
      </div>
      <h2>Please Fill Out Form to Register!</h2>
      <form id="registrationForm" action="Register.php" method="post">
        <div class="input-group <?php echo isset($errors['username']) ? 'error' : ''; ?>">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>">
          <div class="error"><?php echo $errors['username'] ?? ''; ?></div>
        </div>
        <div class="input-group <?php echo isset($errors['email']) ? 'error' : ''; ?>">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
          <div class="error"><?php echo $errors['email'] ?? ''; ?></div>
        </div>
        <div class="input-group <?php echo isset($errors['password']) ? 'error' : ''; ?>">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <div class="error"><?php echo $errors['password'] ?? ''; ?></div>
        </div>
        <div class="input-group <?php echo isset($errors['confirm_password']) ? 'error' : ''; ?>">
          <label for="confirm_password">Confirm Password</label>
          <input type="password" name="confirm_password" id="confirm-password">
          <div class="error"><?php echo $errors['confirm_password'] ?? ''; ?></div>
        </div>
        <button type="submit" name="submit">Register</button>
      </form>
      <p>Yes, I have an account? <a href="Login.php">Login</a></p>
    </div>
    <div class="illustration-section">
      <img src="images/Register.png" alt="Illustration"> 
    </div>
  </div>
</body>
</html>
