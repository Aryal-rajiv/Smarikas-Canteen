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
$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Menu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="manage_menu.css">
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

    <!-- Admin Menu Management -->
    <div class="menu-management">
        <h1>Manage Menu</h1>

        <!-- Add New Menu Item Form -->
        <form action="add_menu.php" method="POST" class="menu-form">
            <h3>Add New Menu Item</h3>
            <label for="name">Menu Item Name</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" required>

            <button type="submit">Add Item</button>
        </form>

        <!-- Menu Table: Display existing items -->
        <h3>Existing Menu Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['price']}</td>
                                <td>
                                    <a href='edit_menu.php?id={$row['id']}'>Edit</a> |
                                    <a href='delete_menu.php?id={$row['id']}'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No menu items found</td></tr>";
                }
                ?>
                
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['price']}</td>
                    <td>
                        <a href='edit_menu.php?id={$row['id']}'>Edit</a> |
                        <a href='delete_menu.php?id={$row['id']}'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No menu items found</td></tr>";
    }
    ?>
</tbody>


        </table>
    </div>

</body>
</html>
