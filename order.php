<?php
include('includes/connection.php');

/* 🔥 AJAX FETCH */
if(isset($_POST['book_fetch'])){

    $book_name = $_POST['book_name'];

    $query = "SELECT author, price FROM books WHERE title='$book_name'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        echo json_encode(["author"=>"", "price"=>""]);
    }
    exit();
}

/* INSERT ORDER */
if(isset($_POST['name'])){

    $book_name = $_POST['book_name'];
    $author    = $_POST['author'];
    $name      = $_POST['name'];
    $email     = $_POST['email'];
    $type     = $_POST['type'];
    $price     = $_POST['price'];
    $quantity  = $_POST['quantity']; // ✅ FIX
    $payment   = $_POST['payment'];
    $account_name   = $_POST['account_name'];
    $account_number = $_POST['account_number'];
    $total_price = $_POST['total_price'];

    $query = "INSERT INTO orders 
    (book_name, author, name, email, price, quantity, payment_method, status, account_name, account_number,total_price,type) 
    VALUES 
    ('$book_name', '$author', '$name', '$email', '$price', '$quantity', '$payment', 'pending','$account_name','$account_number','$total_price','$type')";

    $result = mysqli_query($conn, $query);

    if($result){
        $last_order_id = mysqli_insert_id($conn);
        header("Location: orderid.php?order_id=" . $last_order_id);
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Checkout</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
/* SAME CSS (unchanged) */
body{
    margin:0;
    font-family:Poppins;
    background:#f4f6fa;
    color:#111;
}
.container{
    width:90%;
    min-height:80vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px 0;
}
.form-box{
    width: 350px;
    background:#fff;
    padding:40px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(0,0,0,0.10);
}
h2{
    text-align:center;
    margin-bottom:20px;
}
input, textarea{
    width:100%;
    padding:14px;
    margin:10px 0;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
}
input:focus, textarea:focus{
    border:1px solid #000;
}
.payment-title{
    margin-top:15px;
    font-weight:600;
}
.payment-options{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    margin-top:10px;
}
.pay-card{
    border:1px solid #ddd;
    border-radius:10px;
    padding:12px;
    text-align:center;
    cursor:pointer;
    transition:0.2s;
    background:#fff;
}
.pay-card:hover{
    border:1px solid #000;
}
.pay-card input{
    display:none;
}
.pay-card label{
    cursor:pointer;
    display:block;
    font-weight:500;
}
.pay-card input:checked + label{
    color:#fff;
    background:#000;
    padding:10px;
    border-radius:8px;
}
button{
    width:100%;
    padding:14px;
    margin-top:15px;
    border:none;
    border-radius:10px;
    background:#000;
    color:#fff;
    cursor:pointer;
    font-size:15px;
}
button:hover{
    background:#333;
}
.note{
    text-align:center;
    font-size:12px;
    color:#777;
    margin-top:10px;
}
.form-wrapper{
    display:flex;
    gap:30px;
    align-items:flex-start;
}

/* LEFT SIDE */
.payment-info{
    width:350px;
    background:#fff;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.payment-info h3{
    margin-bottom:10px;
}

.payment-info p{
    font-size:14px;
    margin:10px 0;
}

/* RIGHT SIDE */
.form-box{
    flex:1;
}
</style>
</head>

<body>

<?php include "includes/header.php"; ?>
<?php 
if(isset($result) && $result){
    echo "
    <div id='msg' style='
        width:520px;
        margin:20px auto;
        background:#28a745;
        color:#fff;
        padding:15px;
        text-align:center;
        border-radius:10px;
        font-size:16px;
        box-shadow:0 5px 15px rgba(0,0,0,0.2);
    '>
        Order placed successfully ✔
    </div>

    <script>
        setTimeout(function(){
            document.getElementById('msg').style.display='none';
        }, 2000);
    </script>
    ";
}
?><div class="form-wrapper">

  <!-- LEFT SIDE (Payment Info) -->
  <div class="payment-info">
    <h3>Payment Details</h3>

    <p><b>JazzCash:</b><br> 0300-1234567</p>
    <p><b>EasyPaisa:</b><br> 0312-7654321</p>
    <p><b>Nayapay:</b><br> 0321-1112223</p>
    <p><b>PayPal:</b><br> ReadNova242@email.com</p>
    <p><b>Whatapp</b><br> 0335-2316168</p>

  </div>

  <!-- RIGHT SIDE (Form) -->
  <div class="form-box">
    <h2>Order</h2>

    <form method="POST">
    <select id="book_name" name="book_name" required>
<option value="">Select Book</option>

<?php
$q = mysqli_query($conn,"SELECT title FROM books");
while($row=mysqli_fetch_assoc($q)){
?>
<option value="<?php echo $row['title']; ?>">
<?php echo $row['title']; ?>
</option>
<?php } ?>

</select>
<input type="number" name="quantity" placeholder="Quantity" min="1" value="1" required>

<input type="text" id="author" name="author" placeholder="Author Name" required>
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" placeholder="Email Address" required>
<input type="text" name="type" placeholder="order type ex pdf,cd,hard copy" required>

<input type="text" id="price" name="price" placeholder="Price" required>
<input type="text" id="total_price" name="total_price" placeholder="Total Price" readonly>

<input name="account_name" placeholder="Account name" required>
<input name="account_number" placeholder="Account number" required>
      <div class="payment-title">Select Payment Method</div>

      <div class="payment-options">
        <div class="pay-card">
          <input type="radio" name="payment" value="Nayapay" id="nayapay" required>
          <label for="nayapay">Nayapay</label>
        </div>

        <div class="pay-card">
          <input type="radio" name="payment" value="PayPal" id="paypal">
          <label for="paypal">PayPal</label>
        </div>

        <div class="pay-card">
          <input type="radio" name="payment" value="EasyPaisa" id="easypaisa">
          <label for="easypaisa">EasyPaisa</label>
        </div>

        <div class="pay-card">
          <input type="radio" name="payment" value="JazzCash" id="jazzcash">
          <label for="jazzcash">JazzCash</label>
        </div>
      </div>

      <button type="submit">Place Order</button>
    </form>
  </div>

</div>



<?php include "includes/footer.php"; ?>
<script>
document.getElementById("book_name").addEventListener("keyup", function(){

    let bookName = this.value;

    if(bookName.length > 2){

        fetch("order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "book_fetch=1&book_name=" + encodeURIComponent(bookName)
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById("author").value = data.author;
            document.getElementById("price").value = data.price;
        });

    }
});


function calculateTotal(){
    let price = parseFloat(document.getElementById("price").value) || 0;
    let qty   = parseInt(document.querySelector("input[name='quantity']").value) || 1;

    let total = price * qty;

    document.getElementById("total_price").value = total;
}

/* BOOK FETCH */
document.getElementById("book_name").addEventListener("change", function(){

    let bookName = this.value;

    if(bookName.length > 2){

        fetch("order.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "book_fetch=1&book_name=" + encodeURIComponent(bookName)
        })
        .then(res => res.json())
        .then(data => {
            document.getElementById("author").value = data.author;
            document.getElementById("price").value = data.price;

            calculateTotal(); // 🔥 update total
        });

    }
});

/* QUANTITY CHANGE */
document.querySelector("input[name='quantity']").addEventListener("input", function(){
    calculateTotal();
});
</script>
</script>
</body>
</html>
