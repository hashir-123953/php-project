<?php
session_start();
include("includes/connection.php"); // database connection file

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        
        $row = mysqli_fetch_assoc($result);
        
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        // Sirf admin ke liye redirect
        if($row['role'] == 'admin'){
            header("Location: Admin/dashboard.php");
        } else {
            echo "<script>alert('Access only for admin');</script>";
        }

    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>