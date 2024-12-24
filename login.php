<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Canteen Management System</title>
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

  <div class="login-page">
    <h1>Login</h1>
    <p>Access your account to manage orders and more.</p>
    <form action="#" method="POST" class="login-form" id="loginForm">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" >

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" >

      <button type="submit" class="btn">Login</button>
    </form>
    <p class="register-link">Don't have an account? <a href="#register">Register here</a>.</p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('loginForm');

      form.addEventListener('submit', function (event) {
        let isValid = true;
        // Clear previous error messages
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function (msg) {
          msg.remove();
        });

        // Get form inputs
        const username = document.getElementById('username');
        const password = document.getElementById('password');

        // Validate Username
        if (username.value.trim() === '') {
          showError(username, 'Username is required.');
          isValid = false;
        }

        // Validate Password
        if (password.value.trim() === '') {
          showError(password, 'Password is required.');
          isValid = false;
        } else if (password.value.length < 8) {
          showError(password, 'Password must be at least 8 characters long.');
          isValid = false;
        }

        // If validation fails, prevent form submission
        if (!isValid) {
          event.preventDefault();
        }
      });

      // Function to show error message below the input field
      function showError(inputElement, message) {
        // Create error message
        const errorElement = document.createElement('p');
        errorElement.classList.add('error-message');
        errorElement.style.color = 'red';
        errorElement.textContent = message;

        // Insert error message below the input field
        const parent = inputElement.parentElement;
        if (!parent.querySelector('.error-message')) {
          parent.appendChild(errorElement);
        }
      }
    });
  </script>
</body>
</html>