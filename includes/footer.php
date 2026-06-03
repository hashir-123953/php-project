<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts: Poppins + Font Awesome for icons (stylish footer) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>footer</title>
</head>
<style>
  /* ---------- NEW STYLISH BLACK FOOTER (ONLINE STORE VIBE) ---------- */
    .stylish-black-footer {
      background-color: #000000 !important;
      color: #f0f0f0;
      padding: 3rem 0 1.5rem 0;
      margin-top: 70px;
      font-family: 'Poppins', sans-serif;
      border-top: 1px solid #2a2a2a;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 24px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2.5rem;
      margin-bottom: 2.5rem;
    }

    .footer-brand h3 {
      font-size: 1.8rem;
      font-weight: 700;
      letter-spacing: -0.5px;
      margin-bottom: 0.5rem;
      color: #ffffff;
    }

    .footer-brand p {
      color: #bbbbbb;
      font-size: 0.85rem;
      line-height: 1.4;
      margin-top: 0.5rem;
    }

    .footer-links h4, .footer-newsletter h4, .footer-payment h4 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 1.2rem;
      color: #ffffff;
      letter-spacing: 0.5px;
      position: relative;
      display: inline-block;
    }

    .footer-links h4:after, .footer-newsletter h4:after, .footer-payment h4:after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 35px;
      height: 2px;
      background-color: #ffffff;
    }

    .footer-links ul {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 0.7rem;
    }

    .footer-links a {
      color: #cccccc;
      text-decoration: none;
      font-size: 0.85rem;
      transition: 0.2s;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .footer-links a i {
      font-size: 0.75rem;
      transition: transform 0.2s;
    }

    .footer-links a:hover {
      color: #ffffff;
      transform: translateX(3px);
    }

    .footer-links a:hover i {
      transform: translateX(3px);
    }

    /* newsletter form */
    .newsletter-form {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 0.5rem;
    }

    .newsletter-form input {
      flex: 1;
      padding: 10px 12px;
      border: none;
      border-radius: 40px;
      background-color: #1f1f1f;
      color: #ffffff;
      font-size: 0.8rem;
      outline: none;
      font-family: 'Poppins', sans-serif;
    }

    .newsletter-form input::placeholder {
      color: #aaaaaa;
    }

    .newsletter-form button {
      background-color: #ffffff;
      border: none;
      border-radius: 40px;
      padding: 0 20px;
      font-weight: 600;
      font-size: 0.75rem;
      color: #000000;
      cursor: pointer;
      transition: 0.2s;
    }

    .newsletter-form button:hover {
      background-color: #e0e0e0;
      transform: scale(0.97);
    }

    .payment-icons {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-top: 0.5rem;
    }

    .payment-icons span {
      background: #1c1c1c;
      padding: 6px 12px;
      border-radius: 30px;
      font-size: 0.7rem;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: #dddddd;
    }

    .payment-icons i {
      font-size: 1rem;
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-links a {
      background: #1e1e1e;
      width: 34px;
      height: 34px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      transition: 0.2s;
      text-decoration: none;
    }

    .social-links a:hover {
      background: #ffffff;
      color: #000000;
      transform: translateY(-3px);
    }

    .footer-bottom {
      border-top: 1px solid #1f1f1f;
      padding-top: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      font-size: 0.75rem;
      color: #aaaaaa;
    }

    .footer-bottom a {
      color: #dddddd;
      text-decoration: none;
    }

    .footer-bottom a:hover {
      color: #ffffff;
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .footer-grid {
        gap: 1.8rem;
      }
      .footer-bottom {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }
    }
    /* SOCIAL ICON FIX */
.social-links a {
    width: 20px;
    height: 20px;
    font-size: 16px; /* size control */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #1a1a1a;
    border-radius: 50%;
    color: #fff;
    transition: 0.3s;
}

.social-links a:hover {
     transition: 0.3s ease-out;
     background-color:#1a1a1a
}


/* NEWSLETTER INPUT FIX */
.newsletter-form {
    display: flex;
    gap: 10px;
    margin-top: 10px;
}

.newsletter-form input {
    flex: 1;
    padding: 12px;
    border-radius: 25px;
    border: none;
    background: #1a1a1a;
    color: #fff;
    outline: none;
}

/* SUBSCRIBE BUTTON FIX */
.newsletter-form button {
    padding: 10px 20px;
    border-radius: 25px;
    border: none;
    background: white;
    color: #000;
    font-weight: 500;
    transition: 0.3s;
}

.newsletter-form button:hover {
    transition: 0.3s ease-out;
}
.social-links a {
    width: 40px;
    height: 40px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #1e1e1e;
    border-radius: 50%;
    overflow: hidden; /* IMPORTANT */
}

.social-links img {
    width: 22px;
    height: 22px;
    object-fit: contain;
}
    /* end footer styles */
</style>
<body>
  


<!-- ========== STYLISH BLACK FOOTER (ONLINE STORE / PUBLISHER VIBE) ========== -->
<footer class="stylish-black-footer">
  <div class="footer-container">
    <div class="footer-grid">
      <!-- Brand Column -->
      <div class="footer-brand">
        <h3>ReadNova</h3>
        <p>Your gateway to infinite stories, competitions & digital books. A modern publisher portal for readers and writers.</p>
      <div class="social-links">
  <a href="https://www.facebook.com/"><img src="img/facebook.png" alt="Facebook" ></a>
  <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
  <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
  <a href="#"><img src="img/linkedin.png" alt="LinkedIn"></a>
</div>
      </div>

      <!-- Quick Links (Online Store) -->
      <div class="footer-links">
        <h4>Online Store</h4>
        <ul>
          <li><a href="#"><i class="fas fa-chevron-right"></i> New Arrivals</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Bestsellers</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> eBooks & PDFs</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Hard Copy Deals</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Audiobooks</a></li>
        </ul>
      </div>

      <!-- Support & Policies -->
      <div class="footer-links">
        <h4>Support</h4>
        <ul>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Help Center</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Returns & Refunds</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Shipping Info</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Privacy Policy</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Terms of Sale</a></li>
        </ul>
      </div>

      <!-- Newsletter + Payment -->
      <div class="footer-newsletter">
        <h4>Newsletter</h4>
        <p style="font-size: 0.8rem; color: #bbbbbb;">Get 10% off your first order + weekly book recs</p>
        <div class="newsletter-form">
          <input type="email" placeholder="Your email address" id="footerEmail">
          <button id="subscribeBtn">Subscribe</button>
        </div>
        <div class="footer-payment" style="margin-top: 1.5rem;">
          <h4>Secure Payment</h4>
        <div class="payment-icons">
  <span><img src="img/b-removebg-preview.png" alt="EasyPaisa" width="20"> Nayapay</span>
  <span>  <img src="img/paypal-removebg-preview.png" alt="EasyPaisa" width="20">PayPal</span>

  <!-- Pakistan Mobile Wallets (Custom Style) -->
  <span class="pay easy">
    <img src="img/wasy_paisa-removebg-preview.png" alt="EasyPaisa" width="20">
    EasyPaisa
  </span>

  <span class="pay jazz">
    <img src="img/jascash-removebg-preview.png" alt="JazzCash" width="20">
    JazzCash
  </span>
</div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div>© 2026 ReadNova — Black & White Edition. All rights reserved.</div>
      <div>
        <a href="#">Sitemap</a> &nbsp;|&nbsp; 
        <a href="#">Accessibility</a> &nbsp;|&nbsp; 
        <a href="#">Cookie Preferences</a>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap JS + tiny interactive for newsletter -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Carousel initialization
  const carouselElement = document.querySelector('#mainCarousel');
  if(carouselElement) new bootstrap.Carousel(carouselElement, { interval: 4200, wrap: true, pause: 'hover' });
  
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