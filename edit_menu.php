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

// Check if 'id' is passed in the URL
if (isset($_GET['id'])) {
    $menu_id = $_GET['id'];

    // Fetch the menu item data for the given id
    $sql = "SELECT * FROM menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menu_id); // 'i' means integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $menu_item = $result->fetch_assoc();
    } else {
        die("Menu item not found.");
    }
} else {
    die("No menu ID provided.");
}

// Update the menu item when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Update the menu item in the database
    $update_sql = "UPDATE menu SET name = ?, description = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("ssdi", $name, $description, $price, $menu_id); // 'ssdi' means string, string, double, integer

    if ($stmt->execute()) {
        // Redirect to the menu page after successful update
        header("Location: menu.php");
        exit;
    } else {
        echo "<p>Error updating item.</p>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
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

    <div class="edit-menu-form">
        <h1>Edit Menu Item</h1>

        <form action="edit_menu.php?id=<?php echo $menu_id; ?>" method="POST">
            <label for="name">Menu Item Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($menu_item['name']); ?>" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($menu_item['description']); ?>" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($menu_item['price']); ?>" required>

            <button type="submit">Update Item</button>
        </form>
    </div>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
