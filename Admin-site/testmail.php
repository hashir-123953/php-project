<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

include('../includes/connection.php');

/* ==========================================
   AUTO GET LATEST ORDER ID
========================================== */

$id = $_GET['order_id'] ?? $_SESSION['last_order_id'] ?? '';

if (empty($id)) {
    $latest = mysqli_query($conn, "SELECT id FROM orders ORDER BY id DESC LIMIT 1");
    $latestRow = mysqli_fetch_assoc($latest);

    if ($latestRow) {
        $id = $latestRow['id'];
    } else {
        die("No orders found ❌");
    }
}

/* ==========================================
   FETCH ORDER DATA
========================================== */

$id = mysqli_real_escape_string($conn, $id);

$query = mysqli_query($conn, "SELECT * FROM orders WHERE id='$id'");
$row   = mysqli_fetch_assoc($query);

if (!$row) {
    die("Order not found ❌");
}

$order_id   = $row['id'];
$user_email = $row['email'];
$product    = $row['book_name'];
$price      = $row['price'];

/* ==========================================
   SEND EMAIL
========================================== */

$mail_status = "Email already sent";

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'readnovaebookstore@gmail.com';
    $mail->Password   = 'ncyjnpqmqqjwpmwh';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('readnovaebookstore@gmail.com', 'ReadNova EBook Store');
    $mail->addAddress($user_email);

    $mail->isHTML(true);
    $mail->Subject = "Order Confirmation - #$order_id";

    $mail->Body = "
    <div style='font-family:Arial;padding:20px'>
        <h2 style='color:green;'>Order Confirmed ✅</h2>
        <p>Your order has been placed successfully.</p>
        <p><b>Order ID:</b> #$order_id</p>
        <p><b>Product:</b> $product</p>
        <p><b>Price:</b> Rs. $price</p>
        <br>
        <p>Thank you for shopping with us ❤️</p>
        <p>ReadNova EBook Store</p>
    </div>
    ";

    $mail->send();

    $mail_status = "Order Email Sent Successfully ✅";

} catch (Exception $e) {
    $mail_status = "Email Error: " . $mail->ErrorInfo;
}

/* ==========================================
   GK BOOKS FETCH
========================================== */

$query2 = "SELECT * FROM gk";
$result = mysqli_query($conn, $query2);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage GK Books</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root{
    --bg:#121211;
    --card:#1a1a19;
    --gold:#c5a059;
    --text:#ffffff;
    --dim:#a0a0a0;
    --border:#333330;
}

body{
    margin:0;
    background:var(--bg);
    color:var(--text);
    font-family:'Montserrat',sans-serif;
}

/* Sidebar */
#sidebar{
    position:fixed;
    top:0;
    left:0;
    width:260px;
    height:100vh;
    background:#0a0a0a;
    border-right:1px solid #222;
    overflow-y:auto;
    z-index:999;
}

/* Main */
.main-content{
    margin-left:260px;
    padding:40px;
}

.my-container{
    max-width:1200px;
}

/* Card */
.card-box{
    background:var(--card);
    padding:30px;
    border-radius:14px;
    margin-bottom:30px;
    border:1px solid var(--border);
    box-shadow:0 10px 25px rgba(0,0,0,.3);
}

.card-box h2{
    color:var(--gold);
    margin-bottom:20px;
    font-family:'Playfair Display',serif;
}

/* Header */
header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

header h1{
    font-size:34px;
    font-family:'Playfair Display',serif;
}

header h1 span{
    color:var(--gold);
}

/* Button */
.btn-add{
    background:var(--gold);
    color:#000;
    padding:10px 18px;
    text-decoration:none;
    border-radius:8px;
    font-size:14px;
}

/* Table */
.table-wrapper{
    background:var(--card);
    padding:20px;
    border-radius:14px;
    border:1px solid var(--border);
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    color:var(--gold);
    padding:14px;
    border-bottom:1px solid var(--border);
    font-size:13px;
}

td{
    padding:14px;
    color:var(--dim);
    border-bottom:1px solid #252524;
}

tr:hover td{
    background:rgba(197,160,89,.15);
    color:#fff;
}

img{
    border-radius:8px;
}

.action-links a{
    color:var(--gold);
    margin-right:12px;
    text-decoration:none;
}

.delete-link{
    color:red !important;
}
    /* SIDEBAR */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background-color: #0a0a0a;
            overflow-y: auto;
            border-right: 1px solid #222;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            font-size: 22px;
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            border-bottom: 1px solid #222;
        }

        #sidebar .section-label {
            color: #888;
            font-size: 11px;
            letter-spacing: 2px;
            padding: 15px 20px 5px;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        #sidebar .nav-link i {
            color: #c5a059;
        }

        #sidebar .nav-link:hover {
            background-color: #1a1a19;
            color: #ffffff;
        }

        #sidebar .nav-link.active {
            background-color: #1a1a19;
            color: #c5a059;
            border-left: 3px solid #c5a059;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
        }
    
</style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
<div class="my-container">

<!-- ORDER STATUS -->
<div class="card-box">
    <h2>Order Status</h2>

    <p><strong><?php echo $mail_status; ?></strong></p>
    <hr>

    <p><b>Order ID:</b> #<?php echo $order_id; ?></p>
    <p><b>Email:</b> <?php echo $user_email; ?></p>
    <p><b>Product:</b> <?php echo $product; ?></p>
    <p><b>Price:</b> Rs. <?php echo $price; ?></p>
</div>



</body>
</html>