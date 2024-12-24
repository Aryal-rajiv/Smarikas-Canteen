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

    // Fetch the menu item to confirm the deletion
    $sql = "SELECT name FROM menu WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $menu_id); // 'i' means integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $menu_item = $result->fetch_assoc();
    } else {
        // Redirect if the menu item is not found
        echo "<p>No menu item found with the given ID.</p>";
        echo "<a href='menu.php'>Go back to Menu</a>";
        exit;
    }

    // Handle the form submission for deletion
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'yes') {
            // Proceed with deletion if confirmed
            $delete_sql = "DELETE FROM menu WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $menu_id);
            
            if ($delete_stmt->execute()) {
                // Redirect to the menu page after successful deletion
                header("Location: menu.php");
                exit();
            } else {
                echo "<p>Error deleting item. Please try again.</p>";
            }
        } else {
            // Redirect back to the menu page if deletion is canceled
            header("Location: menu.php");
            exit();
        }
    }

} else {
    // If no ID is provided, show an error
    echo "<p>No menu ID provided.</p>";
    echo "<a href='menu.php'>Go back to Menu</a>";
    exit;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
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

    <div class="confirmation">
        <h1>Are you sure you want to delete the following item?</h1>
        <?php if (isset($menu_item)): ?>
            <p><strong>Menu Item:</strong> <?php echo htmlspecialchars($menu_item['name']); ?></p>
            <form action="delete_menu.php?id=<?php echo $menu_id; ?>" method="POST">
                <button type="submit" name="confirm_delete" value="yes">Yes, Delete</button>
                <button type="submit" name="confirm_delete" value="no">No, Cancel</button>
            </form>
        <?php else: ?>
            <p>Menu item not found. Go back to <a href="menu.php">Menu</a>.</p>
        <?php endif; ?>
    </div>

</body>
</html>
