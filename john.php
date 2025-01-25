<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment_section";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Use the correct field names from your HTML form
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $comment = $conn->real_escape_string($_POST['Comment']);

   // Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO comments_data (Name, Email, Comment) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $comment); // sss indicates that all three are strings

// Execute the prepared statement
if ($stmt->execute() === TRUE) {
    echo "Comment submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

}

// Close the connection
$conn->close();
?>
