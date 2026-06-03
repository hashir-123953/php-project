<?php
include("includes/connection.php");

$query  = "SELECT * FROM winners ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$data = [];
while($row = mysqli_fetch_assoc($result)){
    $data[] = [
        "name"        => $row['name'],
        "title"       => $row['title'],
        "description" => $row['description'],
        "img"         => "img/" . ($row['image'] ?? "default.jpg")
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ReadNova - Winners</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <style>
    * { margin:0; padding:0; box-sizing:border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #fff;
      color: #000;
    }

    /* ── SECTION TITLE ── */
    .section-title {
      text-align: center;
      margin: 60px 0 30px;
      font-weight: 700;
      font-size: 2rem;
    }

    .section-title::after {
      content: '';
      display: block;
      width: 70px;
      height: 3px;
      background: #000;
      margin: 10px auto;
    }

    /* ── WINNER CARD ── */
    .winner-card {
      border: 1px solid #ccc;
      padding: 20px;
      text-align: center;
      transition: 0.3s;
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
    }

    .winner-card:hover {
      transform: translateY(-5px);
      border-color: #000;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* ── CIRCULAR IMAGE ── */
    .img-box {
      width: 160px;
      height: 160px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 15px auto;
      border: 3px solid #000;
    }

    .img-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    /* ── CARD TEXT ── */
    .winner-card h5 {
      font-weight: 600;
      font-size: 1.05rem;
      margin-bottom: 4px;
    }

    .winner-card p {
      font-size: 0.88rem;
      color: #333;
      margin-bottom: 3px;
    }

    .winner-card .desc {
      font-size: 0.82rem;
      color: #666;
    }

    /* ── EMPTY STATE ── */
    .empty-state {
      text-align: center;
      padding: 80px 20px;
      color: #aaa;
    }

    .empty-state i {
      font-size: 3rem;
      margin-bottom: 15px;
      display: block;
    }

    /* ── FOOTER ── */
    .stylish-black-footer {
      background: #000;
      color: #fff;
      padding: 3rem 0;
      margin-top: 60px;
    }

    .footer-container {
      max-width: 1200px;
      margin: auto;
      padding: 0 20px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2rem;
    }

    .footer-links ul { list-style: none; }

    .footer-links a {
      color: #ccc;
      text-decoration: none;
      font-size: 0.85rem;
    }

    .footer-links a:hover { color: #fff; }

    .footer-bottom {
      text-align: center;
      margin-top: 20px;
      font-size: 0.8rem;
      color: #aaa;
    }

    .footer-bottom a { color: #aaa; text-decoration: none; }
    .footer-bottom a:hover { color: #fff; }
  </style>
</head>
<body>

<?php include "includes/header.php"; ?>

<!-- ── WINNERS SECTION ── -->
<div class="container">
  <h2 class="section-title"> Hall of Fame Winners</h2>

  <?php if(empty($data)): ?>
    <div class="empty-state">
      <i class="fas fa-trophy"></i>
      <p>Koi winner abhi tak add nahi kiya gaya.</p>
    </div>
  <?php else: ?>
    <div class="row g-4">
      <?php foreach($data as $w): ?>
      <div class="col-md-4">
        <div class="winner-card">

          <!-- Circular Image -->
          <div class="img-box">
            <img
              src="<?= htmlspecialchars($w['img']) ?>"
              alt="<?= htmlspecialchars($w['name']) ?>"
              onerror="this.src='img/default.jpg'"
            >
          </div>

          <!-- Name, Title, Description -->
          <h5>Name:<?= htmlspecialchars($w['name']) ?></h5>
          <p><?= htmlspecialchars($w['title']) ?></p>
          <p class="desc"><?= htmlspecialchars($w['description']) ?></p>

        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
 <?php include "includes/footer.php"; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const subscribeBtn = document.getElementById('subscribeBtn');
  if(subscribeBtn){
    subscribeBtn.addEventListener('click', function(e){
      e.preventDefault();
      const val = document.getElementById('footerEmail').value.trim();
      if(!val || !val.includes('@')){
        alert('Please enter a valid email address.');
      } else {
        alert('Thanks for subscribing! You\'ll get exclusive deals from ReadNova.');
        document.getElementById('footerEmail').value = '';
      }
    });
  }
   // Stylish footer newsletter demo alert
  const subscribeBtn = document.getElementById('subscribeBtn');
  if(subscribeBtn) {
    subscribeBtn.addEventListener('click', function(e) {
      e.preventDefault();
      const emailInput = document.getElementById('footerEmail');
      const emailVal = emailInput.value.trim();
      if(emailVal === "" || !emailVal.includes('@')) {
        alert("Please enter a valid email address to receive store updates.");
      } else {
        alert(`✨ Thanks for subscribing! ✨\nYou'll get exclusive deals from ReadNova online store.`);
        emailInput.value = '';
      }
    });
  }
</script>

</body>
</html>
