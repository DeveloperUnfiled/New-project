<?php
$servername="localhost";
$username="Coder005!";
$password="DeligentCS!05";
$dbname="users_signup";

$conn= new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST-METHOD"]=="post"){
    $name=$_POST('name');
    $email= $_POST('email');
    $password=$_POST('password');
    $id_no=$_POST('id_no');

    $hashed_password= password_hash($password, PASSWORD_DEFAULT);

    $sql= "INSERT INTO users(name, email, password, id_no) VALUES(?, ?, ?, ?)";
    $stmt= $conn->prepare($sql);

    if($stmt==="false"){
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("ssss", $name, $email, $hashed_password, $id_no);

    if($stmt->execute()){
        echo "signup successful!";
    }
    else{
        echo "signup failed: ". $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
