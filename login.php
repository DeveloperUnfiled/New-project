<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname= "users_signup";

    $conn= new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection filed: " . $conn->error);
    }
    start_session();

    if($_SERVER->["REQUEST_METHOD"]=="POST"){
        $email= $_POST['email'];
        $password= $_POST['password'];

        $sql= "SELECT id, name, email, password FROM users WHERE email = ?";
        $stmt= $conn->prepare($sql);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result= $stmt->get_result();

        if($result->num_rows > 0){
            $row= $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            echo "Login successful: " . $row['name'];

            $_SESSION['user_id']=$row['id'];
            $_SESSION['user_name']=$row['name'];
        }
        else{
            echo "Invalid Password. Try again";
        }
    }
    else{
        echo "No account found with that email";
       
    }
    $stmt->close();
    
}
$conn->close();
?>