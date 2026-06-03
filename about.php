<?php
include("includes/connection.php");

// Connection check
if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO feedback (name, email, service, rating, message, created_at) 
              VALUES ('$name', '$email', '$service', '$rating', '$message', NOW())";

    if(mysqli_query($conn, $query)){
       header("Location: about.php");
        exit();
       
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
  <title>ReadNova — About | Maps | Feedback</title>
  <!-- Google Fonts + Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #fefefe;
      color: #111;
      font-family: 'Inter', 'Poppins', sans-serif;
      scroll-behavior: smooth;
      overflow-x: hidden;
    }


    /* Hero glassmorphism (black & white refined) */
    .hero {
      height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg?auto=compress&cs=tinysrgb&w=1600');
      background-size: cover;
      background-position: center;
      margin-top: 0;
    }

    .hero-content {
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(8px);
      padding: 2rem 3rem;
      border-radius: 28px;
      border: 1px solid rgba(255,255,255,0.2);
      box-shadow: 0 20px 35px rgba(0,0,0,0.3);
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 600;
      letter-spacing: -0.5px;
      color: #fff;
    }

    .hero p {
      color: #eaeaea;
      font-size: 1.1rem;
    }

    /* container */
    .container-custom {
      max-width: 1280px;
      margin: 0 auto;
      padding: 4rem 2rem;
    }

    /* section headings with underline */
    .section-title {
      font-size: 2rem;
      font-weight: 600;
      border-left: 5px solid #000;
      padding-left: 1rem;
      margin-bottom: 2rem;
    }

    /* info panels (image cards) */
    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 2rem;
      margin: 2rem 0;
    }

    .info-card {
      background: #fff;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 12px 28px rgba(0,0,0,0.05);
      transition: 0.25s ease;
      border: 1px solid #eee;
    }

    .info-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 35px rgba(0,0,0,0.1);
    }

    .info-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: 0.3s;
    }

    .info-card:hover img {
      transform: scale(1.03);
    }

    .info-card .card-body {
      padding: 1.5rem;
    }

    .info-card h3 {
      font-size: 1.3rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .info-card p {
      color: #555;
      line-height: 1.5;
    }

    /* steps styling */
    .steps-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin: 2rem 0;
    }

    .step-item {
      background: #fff;
      border-left: 6px solid #000;
      padding: 1.2rem 1.5rem 1.2rem 4rem;
      position: relative;
      border-radius: 14px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      transition: 0.2s;
    }

    .step-item::before {
      content: attr(data-step);
      position: absolute;
      left: 1.2rem;
      top: 50%;
      transform: translateY(-50%);
      background: #000;
      color: white;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 60px;
      font-weight: bold;
      font-size: 0.9rem;
    }

    .step-item:hover {
      background: #000;
      color: #fff;
      border-left-color: #fff;
    }

    .step-item:hover p {
      color: #fff;
    }

    .step-item p {
      margin: 0;
      font-weight: 400;
      color: #222;
    }

    /* highlight box */
    .highlight-box {
      background: #f5f5f5;
      border-left: 7px solid #000;
      padding: 1.5rem 2rem;
      border-radius: 20px;
      margin: 2rem 0;
    }

    /* MAP + FEEDBACK ROW (light/white, minimal) */
    .maps-feedback-row {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin: 3rem 0;
    }

    .map-col, .feedback-col {
      flex: 1;
      min-width: 280px;
      background: #fff;
      border-radius: 24px;
      padding: 1.5rem;
      box-shadow: 0 8px 22px rgba(0,0,0,0.04);
      border: 1px solid #eaeef5;
    }

    .map-col iframe {
      width: 100%;
      height: 280px;
      border-radius: 18px;
      border: 1px solid #ddd;
      filter: grayscale(0.2);
      transition: 0.3s;
    }

    .map-col:hover iframe {
      filter: grayscale(0);
    }

    .feedback-col input, .feedback-col textarea {
      background: #fbfdff;
      border: 1px solid #e2e6ef;
      padding: 0.7rem 1rem;
      width: 100%;
      border-radius: 30px;
      font-size: 0.85rem;
      outline: none;
    }

    .feedback-col textarea {
      border-radius: 20px;
      resize: vertical;
    }

    .feedback-col input:focus, .feedback-col textarea:focus {
      border-color: #000;
    }

    .rating-stars i {
      font-size: 1.5rem;
      cursor: pointer;
      color: #ccc;
      transition: 0.1s;
    }

    .rating-stars i.selected-star {
      color: #000;
    }

    .btn-dark-outline {
      background: transparent;
      border: 1.5px solid #000;
      color: #000;
      padding: 0.6rem 1.5rem;
      border-radius: 40px;
      font-weight: 600;
      transition: 0.2s;
      width: 100%;
    }

    .btn-dark-outline:hover {
      background: #000;
      color: #fff;
    }

    /* ========== STYLISH BLACK FOOTER (exactly inspired) ========== */
    .stylish-black-footer {
      background-color: #000000;
      color: #f0f0f0;
      padding: 3rem 0 1.5rem 0;
      margin-top: 70px;
      font-family: 'Inter', sans-serif;
      border-top: 1px solid #2a2a2a;
    }

    .footer-container {
      max-width: 1280px;
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
      color: #ffffff;
    }

    .footer-links h4, .footer-newsletter h4, .footer-payment h4 {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 1.2rem;
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
    }

    .footer-links a:hover {
      color: white;
      padding-left: 5px;
    }

    .newsletter-form {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .newsletter-form input {
      flex: 1;
      padding: 10px 14px;
      border-radius: 40px;
      border: none;
      background: #1f1f1f;
      color: white;
    }

    .newsletter-form button {
      background: white;
      border: none;
      border-radius: 40px;
      padding: 0 20px;
      font-weight: 600;
    }

    .payment-icons {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .payment-icons span {
      background: #1c1c1c;
      padding: 6px 14px;
      border-radius: 40px;
      font-size: 0.7rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .payment-icons img {
      width: 20px;
      height: auto;
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
      color: white;
      transition: 0.2s;
    }

    .social-links a:hover {
      background: white;
      color: black;
    }

    .footer-bottom {
      border-top: 1px solid #1f1f1f;
      padding-top: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      font-size: 0.75rem;
    }

    @media (max-width: 768px) {
      .hero h1 { font-size: 2rem; }
      .navbar { flex-direction: column; }
      .nav-links { justify-content: center; }
    }
  </style>
</head>
<body>
<?php include "includes/header.php"; ?>

<!-- HERO SECTION -->
<div class="hero">
  <div class="hero-content">
    <h1>About Our Publishing Platform</h1>
    <p>Fast Access • Creative Competitions • Modern Publishing</p>
  </div>
</div>

<div class="container-custom">
  <!-- INTRODUCTION -->
  <div>
    <h2 class="section-title">Introduction</h2>
    <p style="font-size:1rem; line-height:1.6; margin-bottom:1rem;">Welcome to ReadNova — a one-stop destination for readers and writers. Our platform offers books in three formats: PDF, Hard Copy, and CD. With the rapidly evolving world of knowledge, we ensure that our users have access to the latest content across novels, comics, general knowledge, journals, and quiz books.</p>
    <p style="margin-bottom:1rem;">We combine traditional publishing with modern technology to deliver fast updates, interactive experiences, and creative competitions. Registered users enjoy free access to select books, subscription-based updates, and participation in online competitions.</p>
  </div>

  <!-- HOW IT WORKS steps -->
  <h2 class="section-title" style="margin-top: 3rem;">How It Works</h2>
  <div class="steps-list">
    <div class="step-item" data-step="1"><p>Users register on our platform with a simple signup process, creating their personal account.</p></div>
    <div class="step-item" data-step="2"><p>Users browse and search for books using an advanced search system that categorizes content by genre, author, and popularity.</p></div>
    <div class="step-item" data-step="3"><p>Users select their preferred format: PDF for instant access, CD for multimedia collections, or Hard Copy for traditional reading.</p></div>
    <div class="step-item" data-step="4"><p>Users place an order, receive email confirmation, and complete secure payment using credit card, cheque, DD, or VPP.</p></div>
    <div class="step-item" data-step="5"><p>After payment confirmation, PDFs are immediately accessible online, and CDs or Hard Copies are shipped directly.</p></div>
  </div>

  <!-- KEY FEATURES cards -->
  <h2 class="section-title">Key Features</h2>
  <div class="card-grid">
    <div class="info-card"><img src="https://images.pexels.com/photos/18620042/pexels-photo-18620042.jpeg?auto=compress&cs=tinysrgb&w=600" alt="collection"><div class="card-body"><h3>Wide Collection</h3><p>Extensive library across novels, comics, G.K., journals, and quizzes.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/9429403/pexels-photo-9429403.jpeg?auto=compress&cs=tinysrgb&w=600" alt="instant"><div class="card-body"><h3>Instant Access</h3><p>PDF books available immediately after payment confirmation.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/15575660/pexels-photo-15575660.jpeg?auto=compress&cs=tinysrgb&w=600" alt="delivery"><div class="card-body"><h3>Fast Delivery</h3><p>Physical books & CDs shipped quickly with tracking.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/4865737/pexels-photo-4865737.jpeg?auto=compress&cs=tinysrgb&w=600" alt="secure"><div class="card-body"><h3>Secure Payments</h3><p>Credit card, DD, VPP, etc – flexible & safe.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/18620045/pexels-photo-18620045.jpeg?auto=compress&cs=tinysrgb&w=600" alt="competitions"><div class="card-body"><h3>Competitions</h3><p>Essay/story contests with prizes and publication.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/1181595/pexels-photo-1181595.jpeg?auto=compress&cs=tinysrgb&w=600" alt="subscription"><div class="card-body"><h3>Subscription Updates</h3><p>Updated PDFs sent automatically when books are revised.</p></div></div>
  </div>

  <!-- COMPETITIONS highlight -->
  <h2 class="section-title">Competitions & Engagement</h2>
  <div class="highlight-box">
    <p><strong> Creative Contests:</strong> Regular essay and story competitions. Participants upload online, essay timed strictly to 3 hours for fairness. Winners receive books, subscriptions, or recognition. All details & winner announcements are on homepage.</p>
  </div>
  <div class="card-grid">
    <div class="info-card"><img src="https://images.pexels.com/photos/1181595/pexels-photo-1181595.jpeg?auto=compress&cs=tinysrgb&w=600" alt="submission"><div class="card-body"><h3>Online Submission</h3><p>Secure & timed process for essays/stories.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/32636594/pexels-photo-32636594.jpeg?auto=compress&cs=tinysrgb&w=600" alt="winner"><div class="card-body"><h3>Winner Recognition</h3><p>Prizes, certificates, and publication.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/955193/pexels-photo-955193.jpeg?auto=compress&cs=tinysrgb&w=600" alt="realtime"><div class="card-body"><h3>Real-time Updates</h3><p>Live announcements and leaderboards.</p></div></div>
    <div class="info-card"><img src="https://images.pexels.com/photos/1181675/pexels-photo-1181675.jpeg?auto=compress&cs=tinysrgb&w=600" alt="interactive"><div class="card-body"><h3>Interactive Experience</h3><p>Timers, notifications & submission tracking.</p></div></div>
  </div>

<div class="maps-feedback-row">

  <!-- MAP -->
  <div class="map-col">
    <h4><i class="fas fa-map-pin"></i> ReadNova Book-Store</h4>
    <p class="text-muted">221B Knowledge Lane, New York, NY</p>

    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343005!2d-74.00625868459417!3d40.71277607932985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a316e634f1f%3A0x7c7f5c3f5a5f7a0f!2sNew%20York%2C%20NY%2010001!5e0!3m2!1sen!2sus!4v1644261234567!5m2!1sen!2sus" 
        loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Office Location"></iframe>
  </div>

  <!-- FEEDBACK FORM -->
  <div class="feedback-col">
    <h4><i class="fas fa-comment-dots"></i>Share Your Feedback </h4>

    <form id="feedbackForm" method="POST" action="">
      
      <div class="mb-3">
        <input type="text" name="name" placeholder="Your name (optional)" class="w-100">
      </div>

      <div class="mb-3">
        <input type="email" name="email" placeholder="Email address *" required class="w-100">
      </div>

      <div class="mb-3">
        <select name="service" class="w-100" required>
          <option value="">Select Service</option>
          <option value="Books">Books</option>
          <option value="Competition">Competition</option>
          <option value="Subscription">Subscription</option>
        </select>
      </div>

      <div class="mb-2">
        <label>Rate your experience</label>
        <div class="rating-stars" id="starWidget">
          <i class="far fa-star" data-rate="1"></i>
          <i class="far fa-star" data-rate="2"></i>
          <i class="far fa-star" data-rate="3"></i>
          <i class="far fa-star" data-rate="4"></i>
          <i class="far fa-star" data-rate="5"></i>
        </div>
        <input type="hidden" name="rating" id="ratingVal" value="0">
      </div>

      <div class="mb-3">
        <textarea name="message" rows="3" placeholder="Tell us what you think..." required></textarea>
      </div>

      <button type="submit" class="btn-dark-outline">Submit Feedback</button>

    </form>
  </div>
</div>
</div>
<?php include "includes/footer.php"; ?>
<script>
const stars = document.querySelectorAll("#starWidget i");
const ratingInput = document.getElementById("ratingVal");

stars.forEach(star => {
    star.addEventListener("click", function () {
        let value = this.getAttribute("data-rate");
        ratingInput.value = value;

        stars.forEach(s => s.classList.remove("selected-star"));

        for (let i = 0; i < value; i++) {
            stars[i].classList.add("selected-star");
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>