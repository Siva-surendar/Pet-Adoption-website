<?php
// Establish database connection
$servername = "localhost";
$username = "root"; // Adjust if necessary
$password = ""; // Adjust if necessary
$dbname = "pet_adoption";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for error and success messages
$error = '';
$success = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    // Validation
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $error = "Phone number must be 10 digits.";
    } else {
        // Insert data into the query table
        $stmt = $conn->prepare("INSERT INTO query (name, email, phone, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        if ($stmt->execute()) {
            $success = "Your message has been sent successfully.";
        } else {
            $error = "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Platform</title>
    <link rel="stylesheet" href="home2.css">
</head>
<body>
     <!-- navbar.php -->
     <?php include 'navbar.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Embrace Endless Love With Your New Furry Best Friend.</h1>
            <p>Embrace Endless Love With Your New Furry Best Friend.</p>
            <p>Adopt now and start creating unforgettable memories together.</p>
        </div>
        <div class="hero-image">
            <img src="images/slider.png" alt="Woman with a dog">
        </div>
    </section>

    <!-- Search Filter Section -->
    <section class="filter-section">
        <h2>Find Your New Best Friend</h2>
        <div class="filters">
            <select id="pet-type">
                <option value="all">Pet Type</option>
                <option value="dog"> Dog</option>
                <option value="cat"> Cat</option>
                <option value="bird"> Bird</option>
                <option value="others">Others</option>
            </select>
            <select id="breed">
                <option value="all">Breed</option>
            </select>
            <select id="gender">
                <option value="all"> Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <select id="age">
                <option value="all"> Age</option>
                <option value="puppy">Born</option>
                <option value="adult">Adult</option>
                <option value="senior">Senior</option>
            </select>
            <button class="search-btn">Search</button>
        </div>
    </section>

    <!-- Pet Profiles Section -->
    <?php include 'Petprofiles.php'; ?>
        <!-- Profiles -->

    <!-- Hidden Checkbox to trigger popup -->
    <input type="checkbox" id="contact-popup" class="popup-toggle">

    <!-- Popup Modal -->
    <div class="popup-modal">
        <div class="modal-content">
            <label for="contact-popup" class="close-btn">&times;</label>
            <h2>Contact Us</h2>
            <h4>Your Pet Adoption Farm</h4>
            <h5>Address:</h5>
            <p>
                <p>#12,West Garden Street,</p> 
                <p>BKL West Modern city,</p>
                <p>Newyork-49585.</p> 
            </p>
              <div class="contact-logo">
                <img src="images/contact.png" alt="Logo">
              </div>
            <form action="Home.php" method="POST">   
                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?= $error ?></p>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <p style="color: green;"><?= $success ?></p>
                <?php endif; ?>
                <label for="name" class="fullname">Full Name</label>
                <input type="text" id="name"  name="name" >

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="phone" class="phone">Phone</label>
                <input type="phone" id="phone" name="phone">

                <label for="message" class="address">Address</label>
                <textarea id="message" name="message" class="message"></textarea>
                <div class="button">
                    <div class="button-close">
                        <button type="button" class="close">close</button>
                    </div>
                    <div class="button-send">
                        <button type="submit" class="Send">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
