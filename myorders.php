<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Orders - Canteen Management System</title>
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

  <div class="myorders-page">
    <h1>Your Orders</h1>
    <p>Track and manage your orders below. You can also cancel them if needed.</p>

    <!-- Orders Table -->
    <table class="orders-table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Order Details</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Order Row -->
        <tr>
          <td>101</td>
          <td>1 Burger, 2 Fries</td>
          <td><span class="status-pending">Pending</span></td>
          <td><button class="cancel-btn">Cancel Order</button></td>
        </tr>
        <tr>
          <td>102</td>
          <td>2 Pizza, 1 Drink</td>
          <td><span class="status-completed">Completed</span></td>
          <td><button class="cancel-btn" disabled>Completed</button></td>
        </tr>
        <tr>
          <td>103</td>
          <td>3 Sandwiches, 1 Coffee</td>
          <td><span class="status-pending">Pending</span></td>
          <td><button class="cancel-btn">Cancel Order</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
