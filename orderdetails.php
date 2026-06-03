<?php
include("includes/connection.php");

$order = null;
$error = "";
$success = "";

/* CANCEL ORDER */
if(isset($_POST['cancel_order'])){

    $order_id = $_POST['order_id'];

    $cancel_query = "UPDATE orders 
                     SET status='canceled' 
                     WHERE id='$order_id' AND status='pending'";

    $result = mysqli_query($conn, $cancel_query);

    if($result){
        $success = "Your order has been canceled successfully.";
    } else {
        $error = "Cancel failed: " . mysqli_error($conn);
    }
}

/* SEARCH BY EMAIL OR ORDER ID */
if(isset($_POST['search'])){

    $search = $_POST['search_value'];

    if(is_numeric($search)){
        $query = "
        SELECT orders.*, books.image 
        FROM orders 
        LEFT JOIN books 
        ON orders.book_name = books.title 
        WHERE orders.id='$search'
        ";
    } else {
        $query = "
        SELECT orders.*, books.image 
        FROM orders 
        LEFT JOIN books 
        ON orders.book_name = books.title 
        WHERE orders.email='$search'
        ";
    }

    $result = mysqli_query($conn, $query);

    if($result && mysqli_num_rows($result) > 0){
        $order = mysqli_fetch_assoc($result);
    } else {
        $error = "No order found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Order Tracking</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

<style>
body{
    font-family:Poppins;
    background:#f4f6fa;
    margin:0;
}

.container{
    width:100%;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
}

.box{
    width:450px;
    background:#fff;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ddd;
}

button{
    width:100%;
    padding:12px;
    background:#000;
    color:#fff;
    border:none;
    border-radius:8px;
    cursor:pointer;
}

.cancel-btn{
    background:red;
    margin-top:15px;
}

.result{
    margin-top:20px;
    background:#fff;
    padding:20px;
    width:450px;
    border-radius:12px;
}

.status{
    font-weight:bold;
}

.pending{color:orange;}
completed{color:green;}
canceled{color:red;}

.success{
    color:green;
    margin-top:15px;
}
</style>
</head>

<body>
   <?php include "includes/header.php"; ?>
<div class="container">

<div class="box">

<h2>Track Your Order</h2>

<form method="POST">

<input type="text" name="search_value" placeholder="Enter Email or Order ID" required>

<button name="search">Search</button>

</form>

</div>

<!-- SUCCESS MESSAGE -->
<?php if(isset($success)){ ?>
    <p class="success"><?php echo $success; ?></p>
<?php } ?>

<!-- RESULT -->
<?php if($order){ ?>

<div class="result">

<h3>Order Details</h3>

<div style="display:flex; justify-content:space-between; align-items:flex-start; gap:20px;">

    <!-- LEFT SIDE -->
    <div style="flex:1;">

        <p><b>Order ID:</b> <?php echo $order['id']; ?></p>
        <p><b>Book:</b> <?php echo $order['book_name']; ?></p>
        <p><b>Author:</b> <?php echo $order['author']; ?></p>
        <p><b>Quantity:</b> <?php echo $order['quantity']; ?></p>
        <p><b>Price:</b> <?php echo $order['price']; ?></p>
        <p><b>Total-Price:</b> <?php echo $order['total_price']; ?></p>
        <p><b>Name:</b> <?php echo $order['name']; ?></p>
        <p><b>Email:</b> <?php echo $order['email']; ?></p>
        <p><b>Payment:</b> <?php echo $order['payment_method']; ?></p>
        <p><b>Account-Name</b> <?php echo $order['account_name']; ?></p>

        <p><b>Status:</b> 
        <span class="status <?php echo $order['status']; ?>">
        <?php echo ucfirst($order['status']); ?>
        </span>
        </p>

    </div>

    <!-- RIGHT SIDE IMAGE (TOP ALIGN) -->
    <div style="flex-shrink:0; margin-top:0;">
        <img src="images/<?php echo $order['image']; ?>" 
             width="140" 
             style="border-radius:10px; object-fit:cover;">
    </div>

</div>

<!-- CANCEL BUTTON -->
<?php if($order['status'] != 'canceled' && $order['status'] != 'completed'){ ?>

<form method="POST">
    <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
    <button type="submit"  name="cancel_order"class="cancel_order">Cancel Order</button>
</form>

<?php } ?>

</div>

<?php } ?>
<!-- ERROR -->
<?php if($error){ ?>
    <p style="color:red;margin-top:15px;"><?php echo $error; ?></p>
<?php } ?>

</div>

<?php include "includes/footer.php"; ?>

</body>
</html>