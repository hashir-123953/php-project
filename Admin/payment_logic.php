<?php
include "../includes/connection.php";

if(isset($_POST['submit']))
{
    $order_id       = $_POST['order_id'];
    $amount         = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $status         = $_POST['status'];
    $notes          = $_POST['notes'];

    /* ===============================
       CHECK ORDER EXISTS
    =============================== */
    $check = mysqli_query($conn, "SELECT id FROM orders WHERE id='$order_id'");

    if(mysqli_num_rows($check) == 0)
    {
        die("Invalid Order ID ❌");
    }

    $paid_at    = date("Y-m-d H:i:s");
    $created_at = date("Y-m-d H:i:s");

    /* ===============================
       INSERT PAYMENT
    =============================== */
    $query = "
    INSERT INTO payments
    (
        order_id,
        amount,
        payment_method,
        status,
        paid_at,
        notes,
        created_at
    )
    VALUES
    (
        '$order_id',
        '$amount',
        '$payment_method',
        '$status',
        '$paid_at',
        '$notes',
        '$created_at'
    )
    ";

    if(mysqli_query($conn, $query))
    {
        echo "Payment Successful ✅";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>