
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 <style>
  /* ===== DROPDOWN CUSTOM ===== */
.custom-dropdown {
  background-color: var(--charcoal-mid);
  border: 1px solid rgba(201, 168, 76, 0.2);
  padding: 0.5rem 0;
}

.custom-dropdown .dropdown-item {
  color: var(--cream);
  font-size: 0.8rem;
  letter-spacing: 0.1em;
  transition: var(--transition);
}

.custom-dropdown .dropdown-item:hover {
  background-color: rgba(201, 168, 76, 0.1);
  color: var(--gold);
}
#mainNav{
  background-color: black;
}
#logo,.nav-item{
color: white;
line-height: 40px; 
 margin-left:px;
}

/* .navbar-nav .nav-item {
  margin: 0 1px;
} */
 </style>
</head>
<body>
  

<?php $current = basename($_SERVER['PHP_SELF']); ?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg" id="mainNav">
  <div class="container-fluid px-lg-5">
    <a href="#">
            <img src="img/logo1.png" alt="Logo" style="height:40px; width:40px; border-radius:50%; object-fit:cover;  border:2px solid white;margin-right:14px">
          </a>
    <a class="navbar-brand" href="index.php" id="logo">ReadNova</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item" >

          <a class="nav-link <?= $current == 'index.php' ? 'active' : '' ?>" href="index.php" id="logo">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'services.php' ? 'active' : '' ?>" href="services.php"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'books.php' ? 'active' : '' ?>" href="books.php"id="logo">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'winner.php' ? 'active' : '' ?>" href="winner.php"id="logo">Winners</a>
        </li>
         <li class="nav-item">
          <a class="nav-link <?= $current == 'competition.php' ? 'active' : '' ?>" href="competition.php"id="logo">Competition</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'about.php' ? 'active' : '' ?>" href="about.php"id="logo">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $current == 'orderdetails.php' ? 'active' : '' ?>" href="orderdetails.php"id="logo">Review Order</a>
        </li>
        <li class="nav-item dropdown ms-3">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
            <img src="img/logo1.png" alt="Logo1.png" style="height:40px; width:40px; border-radius:50%; object-fit:cover; border:2px solid white">
          </a>
          <ul class="dropdown-menu dropdown-menu-end custom-dropdown">
            <li>
              <a class="dropdown-item" href="Login_page.php">
                <i class="bi bi-box-arrow-in-right me-2"></i> Login
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="register.php">
                <i class="bi bi-person-plus me-2"></i> Register
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* ── Navbar scroll behavior ── */
const mainNav = document.getElementById('mainNav');
if (mainNav) {
  window.addEventListener('scroll', () => {
    mainNav.classList.toggle('scrolled', window.scrollY > 60);
  });

  mainNav.classList.toggle('scrolled', window.scrollY > 60);
}
</script>
</html>