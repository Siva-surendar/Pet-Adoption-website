<!-- navbar.php -->
<nav class="navbar">
    <div class="logo"><img src="images/small.png" alt="Logo"></div>
    <ul class="nav-links">
        <li><a class="Home <?php echo basename($_SERVER['PHP_SELF']) == 'Home.php' ? 'active' : ''; ?>" href="Home.php">Home</a></li>
        <li><a class="Adopt <?php echo basename($_SERVER['PHP_SELF']) == 'Adopt.php' ? 'active' : ''; ?>" href="Adopt.php">Adopt</a></li>
        <li><a class="Get Involved <?php echo basename($_SERVER['PHP_SELF']) == 'GetInvolved.php' ? 'active' : ''; ?>" href="GetInvolved.php">Get Involved</a></li>
        <li><a class="Blog <?php echo basename($_SERVER['PHP_SELF']) == 'Blog.php' ? 'active' : ''; ?>" href="Blog.php">Blog</a></li>
        <li><a class="Aboutus <?php echo basename($_SERVER['PHP_SELF']) == 'AboutUs.php' ? 'active' : ''; ?>" href="AboutUs.php">About Us</a></li>
    </ul>
    <label for="contact-popup" class="contact-btn">Contact Us</label>
    
</nav>
