<?php
include "includes/Connection.php"; // database connection file

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Password Hash (IMPORTANT for security)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
   
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already exists');</script>";
    } else {

        $query = "INSERT INTO users (username, email, password) 
                  VALUES ('$username', '$email', '$password')";

        if(mysqli_query($conn,$query)){
            echo "<script>alert('Registration Successful'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Error occurred');</script>";
        }
    }
}