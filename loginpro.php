<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user details in the database (example with MySQL)
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Verify password
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['password'])) {
        echo "Login successful!";
        // Redirect to a logged-in area
        header("Location: dashboard.html");
      } else {
        echo "Incorrect password.";
      }
    } else {
      echo "No account found with that email.";
    }

    $conn->close();
  }
?>