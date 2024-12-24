<?php
// Database credentials
$host = "localhost"; // Usually localhost if your database is on the same server
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password (usually empty by default for local servers)
$dbname = "cms_db";  // The name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch menu items from the database
$sql = "SELECT * FROM menu"; // Query to fetch all menu items
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu - Canteen Management System</title>
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
      <li><a href="orders.php">Orders</a></li>
      <li><a href="manage_menu.php">Manage Menu</a></li>
    </ul>
  </nav>

  <div class="menu-page">
    <h1>Our Menu</h1>
    <div class="menu-container">
      <?php
      // Check if there are menu items in the database
      if (mysqli_num_rows($result) > 0) {
        // Loop through the results and display each menu item
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='menu-item'>
                  <h3>" . htmlspecialchars($row['name']) . "</h3>
                  <p>" . htmlspecialchars($row['description']) . "</p>
                  <p><strong>Price:</strong> Rs." . htmlspecialchars($row['price']) . "</p>
                </div>";
        }
      } else {
        // If no items are found
        echo "<p>No menu items found</p>";
      }
      ?>
    </div>
  </div>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
