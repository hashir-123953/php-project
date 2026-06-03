<?php
session_start();

/* ===============================
REGISTER SUCCESS MESSAGE PHP
================================= */
$success_msg = "";

if(isset($_SESSION['register_success'])){
    $success_msg = $_SESSION['register_success'];
    unset($_SESSION['register_success']);
}

/* ===============================
USER REGISTER CHECK
Agar register/login ho chuka hai
to popup dobara nahi ayega
================================= */
$is_registered = false;

if(isset($_SESSION['user_id'])){
    $is_registered = true;
}
?>
<?php
include("includes/connection.php");
$carousel = mysqli_query($conn, "SELECT * FROM carousel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ReadNova Home</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet">

<style>
body{
background:#f5f5f7;
font-family:'Jost',sans-serif;
margin:0;
padding:0;
overflow-x:hidden;
}

.container{
margin-top:40px;
}

.carousel{
margin:40px auto;
border-radius:20px;
overflow:hidden;
box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.carousel-item img{
height:70vh;
object-fit:cover;
}

.carousel-caption{
background: rgba(0, 0, 0, 0.5);
padding:25px;
border-left:5px solid #000;
width:400px;
max-width:90%;
bottom:15%;
left:50%;
right:50%;
text-align:center;
border-radius:15px;
}

.section-title{
text-align:center;
margin:70px 0 30px;
font-weight:700;
font-size:2.2rem;
}

.card{
border-radius:20px;
border:none;
transition:.3s;
}

.card:hover{
transform:translateY(-6px);
box-shadow:0 15px 30px rgba(0,0,0,.15);
}

#cardone{
aspect-ratio:2/3;
width:100%;
object-fit:cover;
border-radius:15px;
}

/* POPUP */

.popup-overlay{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.55);
z-index:9998;
display:none;
}

.popup-overlay.show{
display:block;
}

.popup-box{
position:fixed;
top:0;
right:-480px;
width:430px;
max-width:100%;
height:100vh;
background:#121212;
background-image:radial-gradient(circle at center,#1a1a1a 0%,#0a0a0a 100%);
z-index:9999;
padding:40px 30px;
overflow-y:auto;
transition:.45s ease;
box-shadow:-10px 0 30px rgba(0,0,0,.35);
}

.popup-box.show{
right:0;
}

.close-btn{
position:absolute;
top:15px;
right:20px;
font-size:30px;
color:#fff;
cursor:pointer;
}

.form-card{
background:rgba(30,30,30,.6);
border:1px solid rgba(197,160,89,.25);
padding:30px;
border-radius:6px;
margin-top:35px;
}

.logo-text{
font-family:'Cormorant Garamond',serif;
font-size:34px;
color:#c5a059;
text-align:center;
margin-bottom:10px;
}

.form-title{
text-align:center;
color:#fff;
font-size:24px;
margin-bottom:10px;
}

.form-sub{
text-align:center;
color:#999;
margin-bottom:25px;
font-size:14px;
}

.input-group{
margin-bottom:18px;
}

.input-group label{
display:block;
color:#c5a059;
font-size:13px;
margin-bottom:7px;
}

.input-group input{
width:100%;
padding:12px 14px;
background:#1e1e1e;
border:1px solid #333;
color:#fff;
border-radius:4px;
outline:none;
}

.btn-main{
width:100%;
padding:14px;
border:none;
background:#c5a059;
font-weight:700;
color:#000;
margin-top:10px;
border-radius:4px;
cursor:pointer;
}

.switch-text{
text-align:center;
margin-top:18px;
color:#aaa;
font-size:14px;
}

.switch-text a{
color:#fff;
cursor:pointer;
text-decoration:none;
border-bottom:1px solid #c5a059;
}

/* SUCCESS MESSAGE */

.success-box{
position:fixed;
top:20px;
right:20px;
background:#198754;
color:#fff;
padding:14px 22px;
border-radius:8px;
z-index:10000;
box-shadow:0 10px 20px rgba(0,0,0,.2);
font-weight:600;
}

@media(max-width:768px){
.popup-box{
width:100%;
}
.carousel-item img{
height:50vh;
}
}

/* ================= MEMBERSHIP STYLE ================= */
.membership-section{
    margin:70px 0;
}

.membership-block{
    position:relative;
    background:url('images/pexels-cottonbro-4865737.jpg') center/cover no-repeat;
    border-radius:25px;
    overflow:hidden;
    padding:70px 60px;
}

/* DARK OVERLAY */
.membership-block::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.65);
}

/* CONTENT */
.membership-content{
    position:relative;
    z-index:2;
    max-width:550px;
}

/* TITLE */
.membership-content h2{
    color:#fff;
    font-size:2rem;
    font-weight:700;
}

/* TEXT */
.membership-content p{
    color:#ddd;
    margin-top:10px;
    font-size:15px;
}

/* BUTTON */
.btn-member{
    display:inline-block;
    margin-top:15px;
    padding:12px 25px;
    background:#c5a059;
    color:#000;
    font-weight:600;
    border-radius:6px;
    text-decoration:none;
    transition:.3s;
}

.btn-member:hover{
    background:#b8954d;
    color:#000;
}

/* RESPONSIVE */
@media(max-width:768px){
.membership-block{
    padding:40px 25px;
}
}
</style>
</head>

<body>

<?php include "includes/header.php"; ?>

<?php if($success_msg!=""){ ?>
<div class="success-box" id="successBox">
<?php echo $success_msg; ?>
</div>
<?php } ?>

<!-- HOME -->
<div id="mainCarousel" 
     class="carousel slide" 
     data-bs-ride="carousel"
     data-bs-interval="3000"
     data-bs-pause="hover">
<div class="carousel-inner">

<?php 
$active = true;
while($row = mysqli_fetch_assoc($carousel)){ 
?>

<div class="carousel-item <?php if($active){ echo 'active'; $active=false; } ?>">

<img src="images/<?php echo $row['image']; ?>" class="d-block w-100">

<div class="carousel-caption">
<h1><?php echo $row['title']; ?></h1>
<p><?php echo $row['description']; ?></p>
</div>

</div>

<?php } ?>

</div>

<!-- OPTIONAL CONTROLS (same UI better feel) -->
<!-- <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button> -->

</div>
<?php
include("includes/connection.php");
$result = mysqli_query($conn,"SELECT * FROM books ORDER BY id DESC LIMIT 3");
?>

<div class="container">
<h2 class="section-title">New Releases</h2>

<div class="row g-4">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="col-md-4">
<div class="card p-4 h-100">

<img src="images/<?php echo $row['image']; ?>" id="cardone">

<h5 class="mt-4 fw-bold"><?php echo $row['title']; ?></h5>
<p><?php echo $row['author']; ?></p>
<p class="fw-bold">$<?php echo $row['price']; ?></p>

<button class="btn btn-outline-dark w-100">View Details</button>

</div>
</div>

<?php } ?>

</div>
</div>
<?php
/* ================= COMPETITIONS FETCH ================= */
$comp_query = mysqli_query($conn,"SELECT * FROM competitions ORDER BY id DESC LIMIT 2");
?>

<style>
/* ================= COMPETITION STYLE ================= */
.comp-section-title{
    text-align:center;
    margin:60px 0 30px;
    font-weight:700;
    font-size:2rem;
}

.comp-section-title::after{
    content:'';
    display:block;
    width:70px;
    height:3px;
    background:#000;
    margin:10px auto;
}

.comp-card{
    border:1px solid #ccc;
    padding:20px;
    text-align:center;
    border-radius:20px;
    background:#fff;
    transition:.3s;
}

.comp-card:hover{
    transform:translateY(-5px);
    border-color:#000;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

.comp-small{
    font-size:13px;
    color:#555;
}

.comp-status{
    display:inline-block;
    padding:4px 12px;
    font-size:12px;
    border-radius:20px;
    font-weight:bold;
    margin-top:5px;
}

.comp-active{ background:#d4edda; color:#155724; }
.comp-upcoming{ background:#fff3cd; color:#856404; }
.comp-closed{ background:#f8d7da; color:#721c24; }
</style>

<div class="container">

<h2 class="comp-section-title">Latest Competitions</h2>

<div class="row g-4">

<?php while($c=mysqli_fetch_assoc($comp_query)){ ?>

<div class="col-md-6">

    <div class="comp-card">

        <h5><?php echo $c['name']; ?></h5>
        <p><?php echo $c['title']; ?></p>

        <p class="comp-small">
            <?php echo $c['description']; ?>
        </p>

        <p class="comp-small">
            <b>Start:</b> <?php echo $c['start_date']; ?><br>
            <b>End:</b> <?php echo $c['end_date']; ?>
        </p>

        <span class="comp-status comp-<?php echo strtolower($c['status']); ?>">
            <?php echo strtoupper($c['status']); ?>
        </span>

    </div>

</div>

<?php } ?>

</div>
</div>
<?php
/* ================= WINNERS FETCH ================= */
$winner_query = mysqli_query($conn,"SELECT * FROM winners ORDER BY id DESC LIMIT 2");
?>

<style>
/* ================= WINNER STYLE ================= */
.winner-section-title{
    text-align:center;
    margin:60px 0 30px;
    font-weight:700;
    font-size:2rem;
}

.winner-section-title::after{
    content:'';
    display:block;
    width:70px;
    height:3px;
    background:#000;
    margin:10px auto;
}

.winner-card{
    border:1px solid #ccc;
    padding:20px;
    text-align:center;
    border-radius:20px;
    background:#fff;
    transition:.3s;
}

.winner-card:hover{
    transform:translateY(-5px);
    border-color:#000;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

/* IMAGE */
.winner-img{
    width:140px;
    height:140px;
    border-radius:50%;
    overflow:hidden;
    margin:0 auto 15px;
    border:3px solid #000;
}

.winner-img img{
    width:100%;
    height:100%;
    object-fit:cover;
}

/* TEXT */
.winner-card h5{
    font-weight:600;
    font-size:1.05rem;
    margin-bottom:4px;
}

.winner-card p{
    font-size:0.88rem;
    color:#333;
    margin-bottom:3px;
}

.winner-desc{
    font-size:0.82rem;
    color:#666;
}
</style>

<div class="container">

<h2 class="winner-section-title">Latest Winners</h2>

<div class="row g-4">

<?php while($w=mysqli_fetch_assoc($winner_query)){ ?>

<div class="col-md-6">

    <div class="winner-card">

        <!-- IMAGE -->
        <div class="winner-img">
            <img 
                src="img/<?php echo $w['image']; ?>" 
                onerror="this.src='img/default.jpg'"
            >
        </div>

        <!-- TEXT -->
        <h5><?php echo $w['name']; ?></h5>
        <p><?php echo $w['title']; ?></p>
        <p class="winner-desc"><?php echo $w['description']; ?></p>

    </div>

</div>

<?php } ?>

</div>
</div>


<div class="container membership-section">

    <div class="membership-block">

        <div class="membership-content">

            <h2>Become a Member</h2>

            <p>
                Register to access full book details, free PDF samples, 
                and participate in exciting competitions.
            </p>

            <a href="#" class="btn-member" onclick="showRegister()">
                Register Now →
            </a>

        </div>

    </div>

</div>

<?php include "includes/footer.php"; ?>

<!-- POPUP -->

<div class="popup-overlay" id="overlay"></div>

<div class="popup-box" id="popupBox">
<div class="close-btn" onclick="closePopup()">×</div>
<div class="form-card" id="popupContent"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

/* REGISTER FORM */
function registerForm(){
return `
<h1 class="logo-text">ReadNova</h1>
<h2 class="form-title">Create Account</h2>
<p class="form-sub">Join now to continue shopping</p>

<form action="register_logic.php" method="POST">

<div class="input-group">
<label>Username</label>
<input type="text" name="username" required>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit" name="submit" class="btn-main">
REGISTER NOW
</button>

</form>

<div class="switch-text">
Already have account?
<a onclick="showLogin()">Sign In</a>
</div>
`;
}

/* LOGIN FORM */
function loginForm(){
return `
<h1 class="logo-text">ReadNova</h1>
<h2 class="form-title">Sign In</h2>
<p class="form-sub">Login to continue shopping</p>

<form action="login_logic.php" method="POST">

<div class="input-group">
<label>Email</label>
<input type="email" name="email" required>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" required>
</div>

<button type="submit" name="submit" class="btn-main">
LOGIN NOW
</button>

</form>

<div class="switch-text">
Don't have account?
<a onclick="showRegister()">Register</a>
</div>
`;
}

/* FUNCTIONS */

function openPopup(){
document.getElementById("popupBox").classList.add("show");
document.getElementById("overlay").classList.add("show");
}

function closePopup(){
document.getElementById("popupBox").classList.remove("show");
document.getElementById("overlay").classList.remove("show");
}

function showRegister(){
document.getElementById("popupContent").innerHTML = registerForm();
openPopup();
}

function showLogin(){
document.getElementById("popupContent").innerHTML = loginForm();
openPopup();
}

/* PAGE LOAD */
window.onload=function(){

/* SUCCESS MESSAGE */
let box=document.getElementById("successBox");

if(box){
setTimeout(function(){
box.style.display="none";
window.location.href="index.php";
},2000);
}

/* USER LOGIN/REGISTER NA HO TAB popup */
<?php if(!$is_registered){ ?>
setTimeout(function(){
showRegister();
},2000);
<?php } ?>

};

/* PAGE CLICK */
document.addEventListener("click",function(e){

<?php if(!$is_registered){ ?>

if(
!document.getElementById("popupBox").contains(e.target)
){
showRegister();
}

<?php } ?>

});

document.getElementById("overlay").onclick=closePopup;

</script>

</body>
</html>