<?php
session_start();
include "includes/Connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // client from login
    $client_id = $_SESSION['user_id'];

    // form data
    $service_id = $_POST['service_id'];
    $staff_id = $_POST['staff_id'];
    $date_time = $_POST['date_time'];

    $status = isset($_POST['status']) ? $_POST['status'] : 'Booked';
    $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;
    $notes = isset($_POST['notes']) ? $_POST['notes'] : '';

    // 🚫 prevent double booking
    $check = mysqli_query($conn,
        "SELECT * FROM appointments 
         WHERE staff_id='$staff_id' AND date_time='$date_time'"
    );

    if(mysqli_num_rows($check) > 0){
        echo "This slot is already booked!";
        exit();
    }

    // insert query
    $query = "INSERT INTO appointments 
    (client_id, service_id, staff_id, date_time, status, total_amount, notes, created_at, updated_at)
    VALUES 
    ('$client_id','$service_id','$staff_id','$date_time','$status','$total_amount','$notes',NOW(),NOW())";

    if(mysqli_query($conn, $query)){
        echo "Booking Successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>