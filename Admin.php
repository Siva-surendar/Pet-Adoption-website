<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pet_adoption';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Get form data
    $pet_type = $_POST['pet_type'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];
    $age = intval($_POST['age']);
    $image_path = $_POST['image_path'];  // Get the image path from the form

    // Debugging: Print image path
    echo "Image Path: " . $image_path . "<br>";

    // SQL Insert Query to save pet details and image path
    $stmt = $conn->prepare("INSERT INTO pets_profiles (pet_type, breed, gender, age, image_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $pet_type, $breed, $gender, $age, $image_path);

    if ($stmt->execute()) {
        echo "Pet details and image path uploaded successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Pet Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="file"] {
            border: none;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>PET DETAILS</h2>
    <form action="" method="POST">
        <label>Pet Type:</label>
        <input type="text" name="pet_type" required><br>

        <label>Breed:</label>
        <input type="text" name="breed" required><br>

        <label>Gender:</label>
        <input type="text" name="gender" required><br>

        <label>Age:</label>
        <input type="number" name="age" required><br>

        <label>Image Path (URL or local path):</label>
        <input type="text" name="image_path" placeholder="Enter image path or URL" required><br>

        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>
