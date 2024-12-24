<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Canteen Management System</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .error-message {
      font-size: 0.9rem;
      color: red;
      margin-top: 5px;
    }
  </style>
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

  <div class="register-page">
    <h1>Create an Account</h1>
    <p>Join us and enjoy seamless canteen management!</p>
    <form action="register.php" method="POST" class="register-form">
      <label for="firstname">First Name</label>
      <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" >

      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" >

      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Choose a username" >

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" >

      <label for="mobile">Mobile Number</label>
      <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" >

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter a password" >

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" >

      <!-- Role Selection -->
      <label for="role">Register as</label>
      <select id="role" name="role" >
        <option value="">-- Select Role --</option>
        <option value="customer">Customer</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit" class="btn">Register</button>
    </form>
    <p class="login-link">Already have an account? <a href="login.php">Login here</a>.</p>
  </div>

  <script> 
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.querySelector('.register-form');

      form.addEventListener('submit', function (event) {
        let isValid = true;
        // Clear previous error messages
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function (msg) {
          msg.remove();
        });

        // Get form inputs
        const firstname = document.getElementById('firstname');
        const lastname = document.getElementById('lastname');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const mobile = document.getElementById('mobile');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');
        const role = document.getElementById('role');

        // Validate First Name
        if (firstname.value.trim() === '') {
          showError(firstname, 'First name is required.');
          isValid = false;
        }

        // Validate Last Name
        if (lastname.value.trim() === '') {
          showError(lastname, 'Last name is required.');
          isValid = false;
        }

        // Validate Username
        if (username.value.trim() === '') {
          showError(username, 'Username is required.');
          isValid = false;
        }