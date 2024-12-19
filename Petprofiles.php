<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_adoption";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pet profiles
$sql = "SELECT pet_type, breed, gender, age, image_path FROM pets_profiles";
$result = $conn->query($sql);
?>

<!-- Pet Profiles Section -->
<section class="pet-profiles">
    <div class="profiles-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <?php
        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
        <div class="pet-profile" style="
            width: 130px; 
            height:auto;
            text-align: center; 
            border: 1px solid #B68600;
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            padding: 10px; 
            background-color: #fff;">
            <!-- Pet Image -->
            <img src="<?= htmlspecialchars($row['image_path']); ?>" 
                 alt="Pet Image" 
                 style="width: 100%; height: 180px; margin: left 50px; object-fit: cover; border-radius: 10px;">
            
            <!-- Pet Details -->
            <h3 style="margin: 10px 0 5px; font-size: 18px;"><?= htmlspecialchars($row['pet_type']); ?></h3>
            <p style="margin: 5px 0; font-size: 14px;"><?= htmlspecialchars($row['breed']); ?></p>
            <p style="margin: 5px 0; font-size: 14px;">Gender: <?= htmlspecialchars($row['gender']); ?></p>
            <p style="margin: 5px 0; font-size: 14px;">Age: <?= htmlspecialchars($row['age']); ?> years</p>
        </div>
        <?php
            endwhile;
        else:
        ?>
        <p style="text-align: center; font-size: 18px;">No pets available for adoption at the moment.</p>
        <?php
        endif;
        ?>
    </div>
</section>

<?php
// Close the database connection
$conn->close();
?>
