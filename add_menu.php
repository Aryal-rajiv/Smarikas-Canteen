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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Prepare SQL query to insert data into the menu table
    $sql = "INSERT INTO menu (name, description, price) VALUES ('$name', '$description', '$price')";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $sql)) {
        echo "New menu item added successfully!";
        // Redirect back to the menu management page
        header("Location: menu.php"); // Redirect to menu page after successful insertion
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item - Canteen Management System</title>
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

    <div class="menu-management">
        <h1>Add New Menu Item</h1>

        <!-- Add New Menu Item Form -->
        <form action="add_menu.php" method="POST" class="menu-form">
            <label for="name">Menu Item Name</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" required>

            <button type="submit">Add Item</button>
        </form>
    </div>

</body>
</html>
