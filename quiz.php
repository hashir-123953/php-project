<?php 
include('includes/connection.php'); 

// ✅ ONLY NOVELS FETCH
$query = "SELECT * FROM quiz"; 
$result = mysqli_query($conn, $query); 

$data = []; 

while($row = mysqli_fetch_assoc($result)){
    $data[] = [
        "id"       => $row['id'],
        "title"    => $row['title'],
        "author"   => $row['author'],
        "price"    => $row['price'],
        "img"      => "images/" . ($row['image'] ?? "default.jpg"),
        "category" => $row['category'] ?? "Novels"
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Novels | ReadNova Book Store</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { margin:0; font-family:Poppins; background:#f4f6fa; }

.main {
  display:flex;
  flex-direction:column;
  height:100vh;
}

.topbar {
  background:white;
  padding:10px;
  border-bottom:1px solid #ddd;
  text-align:center;
}

.topbar button {
  margin:5px;
  padding:8px 12px;
  border:none;
  border-radius:8px;
  background:#f4f6fa;
  cursor:pointer;
}

.topbar button:hover {
  background:#111;
  color:white;
}

.search-box input {
  width:60%;
  padding:8px;
  border-radius:8px;
  border:1px solid #ccc;
}

.content {
  display:flex;
  flex:1;
  overflow:hidden;
}

.center {
  flex:1;
  padding:20px;
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
  gap:20px;
  overflow:auto;
}

.card {
  background:white;
  padding:12px;
  border-radius:12px;
  box-shadow:0 4px 12px rgba(0,0,0,0.1);
  text-align:center;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
}

.card img {
  width:100%;
  height:150px;
  object-fit:contain;
  background:#eee;
  border-radius:8px;
}

.card h3 { font-size:15px; margin:8px 0; }

.card-buttons {
  display:flex;
  gap:6px;
  margin-top:10px;
}

.card-buttons button {
  flex:1;
  padding:8px;
  border:none;
  border-radius:8px;
  cursor:pointer;
}

.right {
  width:280px;
  background:white;
  padding:15px;
  border-left:1px solid #ddd;
  overflow:auto;
}

.cart-item {
  background:#f8f9fc;
  padding:10px;
  margin-bottom:10px;
  border-radius:8px;
  font-size:13px;
}

.cart-item button {
  margin-top:6px;
  padding:5px 8px;
  border:none;
  background:red;
  color:white;
  border-radius:6px;
  cursor:pointer;
}

#submitBtn {
  width:100%;
  padding:10px;
  border:none;
  border-radius:8px;
  background:black;
  color:white;
  margin-top:10px;
  display:none;
}
</style>
</head>

<body>

<?php include "includes/header.php"; ?>

<div class="main">

  <!-- TOP NAVBAR -->
  <div class="topbar">
    <div>
      <button onclick="window.location.href='books.php'">All</button>
      <button onclick="window.location.href='novel.php'">Novels</button>
      <button onclick="window.location.href='gk.php'">GK</button>
      <button onclick="window.location.href='quiz.php'">Quiz</button>
    </div>

    <div class="search-box mt-2">
      <input type="text" id="search" placeholder="Search novels...">
    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- CENTER -->
    <div class="center" id="books"></div>

    <!-- RIGHT -->
    <div class="right">
      <h3>Cart (<span id="count">0</span>)</h3>
      <div id="cart"></div>

      <h4>Total: Rs <span id="total">0</span></h4>

      <button id="submitBtn" onclick="window.location.href='order.php'">
        Submit Order
      </button>
    </div>

  </div>

</div>

<?php include "includes/footer.php"; ?>

<script>
let books = <?php echo json_encode($data); ?>;
let cart = [];

function showBooks(list){
  let html = "";

  list.forEach(b => {
    html += `
    <div class="card">
      <img src="${b.img}" onerror="this.src='images/default.jpg'">
      <h3>${b.title}</h3>
      <p>${b.author}</p>
      <p>Rs ${b.price}</p>

      <div class="card-buttons">
        <button style="background:#6c757d;color:white;" onclick="viewBook(${b.id})">View</button>
        <button style="background:#111;color:white;" onclick="addCart(${b.id})">Add</button>
      </div>
    </div>`;
  });

  document.getElementById("books").innerHTML = html;
}

function viewBook(id){
  let b = books.find(x => x.id == id);
  alert(b.title + "\n" + b.author + "\nRs " + b.price);
}

function addCart(id){
  let item = books.find(b => b.id == id);
  let exist = cart.find(c => c.id == id);

  if(exist) exist.qty++;
  else cart.push({...item, qty:1});

  renderCart();
}

function removeItem(id){
  cart = cart.filter(i => i.id != id);
  renderCart();
}

function renderCart(){
  let html = "";
  let total = 0;
  let count = 0;

  cart.forEach(i => {
    total += i.price * i.qty;
    count += i.qty;

    html += `
    <div class="cart-item">
      <strong>${i.title}</strong><br>
      ${i.qty} x Rs ${i.price}<br>
      <button onclick="removeItem(${i.id})">Cancel</button>
    </div>`;
  });

  document.getElementById("cart").innerHTML =
    html || "<p style='color:#aaa'>Cart empty</p>";

  document.getElementById("total").innerText = total;
  document.getElementById("count").innerText = count;

  document.getElementById("submitBtn").style.display =
    cart.length > 0 ? "block" : "none";
}

showBooks(books);

document.getElementById("search").addEventListener("keyup", function(){
  let val = this.value.toLowerCase();

  let filtered = books.filter(b =>
    b.title.toLowerCase().includes(val) ||
    b.author.toLowerCase().includes(val)
  );

  showBooks(filtered);
});
</script>

</body>
</html>