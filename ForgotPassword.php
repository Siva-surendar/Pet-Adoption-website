<?php
// Start the session
session_start();

// Include PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include database connection
$connection = mysqli_connect("localhost", "root", "", "pet_adoption");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize variables and error messages
$email = "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Validate inputs
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($errors)) {
        // Check if email exists in the database
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            // Generate and store OTP in session
            $otp = rand(100000, 999999);  // Generate a random 6-digit OTP
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

            // Send OTP via email using PHPMailer
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp-relay.brevo.com';  // Brevo SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = '8201d7001@smtp-brevo.com';  // Replace with your Brevo email
                $mail->Password = 'xsmtpsib-391e065657f79819d588b1a925180942e98c57eb0977374cc0edeebf967fe82a-r9Mt0bPgZXcHV1JF';  // Replace with your Brevo API key
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;  // Port for TLS encryption

                // Email content
                $mail->setFrom('sivasurendar118@gmail.com', 'Pet Adoption Website');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Code';
                $mail->Body    = "Your OTP is: $otp. It will expire in 5 minutes.";

                // Send email
                if ($mail->send()) {
                    header("Location: verify_otp.php");  // Redirect to OTP verification page
                    exit;
                } else {
                    $errors['email'] = "Failed to send OTP. Try again later.";
                }
            } catch (Exception $e) {
                $errors['email'] = "Error while sending email: " . $mail->ErrorInfo;
            }
        } else {
            $errors['email'] = "Email not found in our records.";
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
  <title>Forgot Password</title>
  <link rel="stylesheet" href="Login2.css">
</head>
<body>
  <div class="login-container">
    <div class="login-illustration">
      <img src="images/login_png.png" alt="Forgot Password Illustration">
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="images/crystal_delta.png" alt="Crystal Delta Logo">
      </div>
      <h2>Forgot Password</h2>
      <form action="ForgotPassword.php" method="post">
        <div class="input-group <?php echo isset($errors['email']) ? 'error' : ''; ?>">
          <label for="email">Email Address</label>
          <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" >
          <?php if (isset($errors['email'])): ?>
            <div class="error"><?php echo $errors['email']; ?></div>
          <?php endif; ?>
        </div>
        <button type="submit">Send OTP</button>
      </form>
      <p class="register">
        Remembered your password? <a href="Login.php">Login</a>
      </p>
    </div>
  </div>
</body>
</html>
