<?php 
$servername= "localhost";
$username= "root";
$password= "";
$dbname= "comment_section";

$conn= new mysqli("$servername, $username, $password, $dbname");
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error)
}
$sql= "SELECT Name, Comment, Created_at FROM comments_data ORDER BY Created_at DESC; 
$result= $conn->query($sql);

if ($result->num_rows > 0) 
{
    while ($row = $result->fetch_assoc())
     {
        echo "<p><strong>" . htmlspecialchars($row["username"]) . "</strong>: " . htmlspecialchars($row["comment_text"]) . " <em>(" . $row["created_at"] . ")</em></p>";
    }
} 
else 
{
    echo "No comments yet!";
}
$conn->close();
?>