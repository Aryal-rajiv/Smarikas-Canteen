<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Canteen Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <div class="logo">CanteenMS</div>
    <ul>
    <li><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="myorders.php">My Orders</a></li>
        <li><a href="orders.php"> Orders</a></li>
        <li><a href="manage_menu.php">Manage Menu</a></li>
    </ul>
  </nav>

  <div class="contact-page">
    <h1>Contact Us</h1>
    <p>We would love to hear from you! Fill out the form below or reach out to us using the contact information provided.</p>
    <div class="contact-container">
      <form action="#" method="POST" class="contact-form">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your Name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your Email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

        <button type="submit" class="btn">Send Message</button>
      </form>

      <div class="contact-info">
        <h3>Contact Information</h3>
        <p><strong>Phone:</strong> +977 9700000000</p>
        <p><strong>Email:</strong> support@canteenms.com</p>
        <p><strong>Address:</strong> Bakulahar, Food City</p>
      </div>
    </div>
  </div>
</body>
</html>
