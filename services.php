<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Services — Elegance Salon</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="assets/main.js" />
  <style>
    :root {
      --charcoal: #141414; --charcoal-mid: #1e1e1e; --charcoal-light: #2a2a2a;
      --gold: #c9a84c; --gold-light: #e2c97e; --gold-dim: rgba(201,168,76,0.15);
      --cream: #f5f0e8; --text-muted-light: #9a9a9a;
      --transition: 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior:smooth; }
    body { background-color:var(--charcoal); color:var(--cream); font-family:'Jost',sans-serif; font-weight:300; overflow-x:hidden; }
    h1,h2,h3,h4,h5 { font-family:'Cormorant Garamond',serif; }
    ::selection { background:var(--gold); color:var(--charcoal); }

    /* NAVBAR */
    .navbar { position:fixed; top:0; left:0; right:0; z-index:1000; padding:1rem 3rem; background:rgba(20,20,20,0.97); backdrop-filter:blur(20px); border-bottom:1px solid rgba(201,168,76,0.2); }
    .navbar-brand { font-family:'Cormorant Garamond',serif; font-size:1.8rem; font-weight:600; color:var(--gold) !important; text-decoration:none; }
    .navbar-brand span { color:var(--cream); font-weight:300; }
    .nav-link { color:var(--cream) !important; font-size:0.78rem; letter-spacing:0.2em; text-transform:uppercase; padding:0.5rem 1.2rem !important; transition:color var(--transition); position:relative; }
    .nav-link::after { content:''; position:absolute; bottom:0; left:1.2rem; right:1.2rem; height:1px; background:var(--gold); transform:scaleX(0); transition:transform var(--transition); }
    .nav-link:hover::after,.nav-link.active::after { transform:scaleX(1); }
    .nav-link:hover,.nav-link.active { color:var(--gold) !important; }
    .navbar-toggler { border:1px solid var(--gold); }
    .navbar-toggler-icon { filter:invert(1); }

    /* PAGE HERO */
    .page-hero { padding:10rem 0 5rem; position:relative; overflow:hidden; text-align:center; }
    .page-hero::before { content:''; position:absolute; inset:0; background:radial-gradient(ellipse 80% 60% at 50% 100%, rgba(201,168,76,0.08) 0%, transparent 70%); }
    .page-hero-label { font-size:0.65rem; letter-spacing:0.5em; text-transform:uppercase; color:var(--gold); margin-bottom:1rem; display:flex; align-items:center; justify-content:center; gap:1rem; }
    .page-hero-label::before,.page-hero-label::after { content:''; width:30px; height:1px; background:var(--gold); display:block; }
    .page-hero h1 { font-size:clamp(3rem,6vw,5.5rem); font-weight:300; margin-bottom:1.5rem; }
    .page-hero h1 em { color:var(--gold); font-style:italic; }
    .page-hero p { color:var(--text-muted-light); font-size:1rem; max-width:550px; margin:0 auto; line-height:1.9; }

    /* FILTER TABS */
    .filter-section { padding:3rem 0 2rem; position:sticky; top:76px; z-index:100; background:var(--charcoal); border-bottom:1px solid rgba(201,168,76,0.1); }
    .filter-tabs { display:flex; gap:0.5rem; flex-wrap:wrap; justify-content:center; }
    .filter-tab { background:transparent; border:1px solid rgba(201,168,76,0.2); color:var(--text-muted-light); font-family:'Jost',sans-serif; font-size:0.72rem; letter-spacing:0.2em; text-transform:uppercase; padding:0.6rem 1.5rem; cursor:pointer; transition:var(--transition); }
    .filter-tab:hover,.filter-tab.active { background:var(--gold); border-color:var(--gold); color:var(--charcoal); }

    /* SERVICE CATEGORY */
    .service-section { padding:5rem 0; border-bottom:1px solid rgba(255,255,255,0.04); }
    .category-header { margin-bottom:3rem; }
    .cat-label { font-size:0.6rem; letter-spacing:0.4em; text-transform:uppercase; color:var(--gold); margin-bottom:0.5rem; display:flex; align-items:center; gap:0.8rem; }
    .cat-label::before { content:''; width:25px; height:1px; background:var(--gold); display:block; }
    .cat-title { font-size:clamp(2rem,4vw,3rem); font-weight:300; }
    .cat-title em { font-style:italic; color:var(--gold); }
    .cat-desc { color:var(--text-muted-light); font-size:0.87rem; line-height:1.9; max-width:500px; margin-top:0.8rem; }

    /* SERVICE PRICE CARD */
    .svc-card { background:var(--charcoal-mid); border:1px solid rgba(201,168,76,0.08); padding:2rem; height:100%; position:relative; overflow:hidden; transition:var(--transition); cursor:pointer; }
    .svc-card::before { content:''; position:absolute; inset:0; background:linear-gradient(135deg, rgba(201,168,76,0.05), transparent); opacity:0; transition:opacity var(--transition); }
    .svc-card:hover { border-color:rgba(201,168,76,0.35); transform:translateY(-6px); box-shadow:0 20px 40px rgba(0,0,0,0.4); }
    .svc-card:hover::before { opacity:1; }
    .svc-card-top { display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:1.2rem; }
    .svc-duration { font-size:0.65rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--gold); background:var(--gold-dim); padding:0.3rem 0.7rem; display:inline-block; }
    .svc-icon { font-size:1.5rem; color:var(--gold); opacity:0.6; transition:opacity var(--transition); }
    .svc-card:hover .svc-icon { opacity:1; }
    .svc-card h5 { font-size:1.2rem; font-weight:400; margin-bottom:0.6rem; }
    .svc-card p { font-size:0.82rem; color:var(--text-muted-light); line-height:1.8; margin-bottom:1.5rem; }
    .svc-price-row { display:flex; justify-content:space-between; align-items:center; padding-top:1.2rem; border-top:1px solid rgba(201,168,76,0.1); }
    .svc-price { font-family:'Cormorant Garamond',serif; font-size:1.5rem; color:var(--gold); font-weight:600; }
    .svc-price span { font-size:0.8rem; color:var(--text-muted-light); font-family:'Jost',sans-serif; font-weight:300; }
    .book-mini { font-size:0.65rem; letter-spacing:0.2em; text-transform:uppercase; color:var(--cream); text-decoration:none; transition:color var(--transition); }
    .book-mini:hover { color:var(--gold); }
    .book-mini i { margin-left:0.3rem; }

    /* POPULAR BADGE */
    .popular-badge { position:absolute; top:0; right:0; background:var(--gold); color:var(--charcoal); font-size:0.6rem; letter-spacing:0.2em; text-transform:uppercase; padding:0.3rem 0.8rem; font-weight:500; }

    /* CATEGORY IMAGE */
    .cat-image { height:340px; overflow:hidden; position:relative; }
    .cat-image img { width:100%; height:100%; object-fit:cover; filter:brightness(0.7) sepia(10%); transition:transform 0.8s ease; }
    .cat-image:hover img { transform:scale(1.05); }
    .cat-image-overlay { position:absolute; inset:0; background:linear-gradient(to right, rgba(20,20,20,0.3), transparent); }

    /* PACKAGES */
    .section-packages { padding:6rem 0; background:var(--charcoal-mid); }
    .package-card { border:1px solid rgba(201,168,76,0.2); padding:3rem; height:100%; position:relative; transition:var(--transition); }
    .package-card.featured { border-color:var(--gold); background:linear-gradient(135deg, rgba(201,168,76,0.05), transparent); }
    .package-card:hover { transform:translateY(-6px); }
    .pkg-name { font-size:0.65rem; letter-spacing:0.4em; text-transform:uppercase; color:var(--gold); margin-bottom:1rem; }
    .pkg-title { font-size:2rem; font-weight:300; margin-bottom:0.5rem; }
    .pkg-price { font-family:'Cormorant Garamond',serif; font-size:3rem; font-weight:600; color:var(--gold); line-height:1; margin-bottom:2rem; }
    .pkg-price small { font-size:1rem; color:var(--text-muted-light); font-family:'Jost',sans-serif; font-weight:300; }
    .pkg-features { list-style:none; padding:0; margin-bottom:2rem; }
    .pkg-features li { display:flex; align-items:center; gap:0.7rem; font-size:0.87rem; color:var(--text-muted-light); margin-bottom:0.8rem; }
    .pkg-features li i { color:var(--gold); font-size:0.8rem; }
    .btn-gold { display:inline-block; background:var(--gold); color:var(--charcoal); font-family:'Jost',sans-serif; font-weight:500; font-size:0.75rem; letter-spacing:0.25em; text-transform:uppercase; padding:0.9rem 2rem; text-decoration:none; transition:var(--transition); border:1px solid var(--gold); }
    .btn-gold:hover { background:transparent; color:var(--gold); }
    .btn-outline-gold { display:inline-block; background:transparent; color:var(--cream); font-family:'Jost',sans-serif; font-weight:400; font-size:0.75rem; letter-spacing:0.25em; text-transform:uppercase; padding:0.9rem 2rem; text-decoration:none; transition:var(--transition); border:1px solid rgba(245,240,232,0.3); }
    .btn-outline-gold:hover { border-color:var(--gold); color:var(--gold); }
    .section-label { font-size:0.65rem; letter-spacing:0.4em; text-transform:uppercase; color:var(--gold); margin-bottom:1rem; display:flex; align-items:center; gap:1rem; }
    .section-label::before { content:''; width:30px; height:1px; background:var(--gold); display:block; }
    .section-title { font-size:clamp(2.2rem,4vw,3.5rem); font-weight:300; line-height:1.2; margin-bottom:1rem; }
    .section-title em { font-style:italic; color:var(--gold); }

    /* FOOTER */
    footer { background:#0e0e0e; padding:5rem 0 2rem; border-top:1px solid rgba(201,168,76,0.1); }
    .footer-brand { font-family:'Cormorant Garamond',serif; font-size:2rem; font-weight:600; color:var(--gold); }
    .footer-brand span { color:var(--cream); font-weight:300; }
    .footer-tagline { font-size:0.75rem; letter-spacing:0.25em; text-transform:uppercase; color:var(--text-muted-light); margin-top:0.5rem; }
    .footer-heading { font-size:0.65rem; letter-spacing:0.3em; text-transform:uppercase; color:var(--gold); margin-bottom:1.5rem; }
    .footer-links { list-style:none; padding:0; }
    .footer-links li { margin-bottom:0.8rem; }
    .footer-links a { color:var(--text-muted-light); text-decoration:none; font-size:0.87rem; transition:color var(--transition); }
    .footer-links a:hover { color:var(--gold); }
    .social-icons { display:flex; gap:0.8rem; margin-top:1.5rem; }
    .social-icon { width:38px; height:38px; border:1px solid rgba(201,168,76,0.25); display:flex; align-items:center; justify-content:center; color:var(--text-muted-light); text-decoration:none; font-size:0.9rem; transition:var(--transition); }
    .social-icon:hover { border-color:var(--gold); color:var(--gold); }
    .footer-bottom { border-top:1px solid rgba(255,255,255,0.05); padding-top:2rem; margin-top:3rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem; }
    .footer-bottom p { font-size:0.75rem; color:var(--text-muted-light); margin:0; }
    
    @media (max-width:991px) { .navbar { padding:1rem 1.5rem; } .filter-section { top:65px; } }
  </style>
</head>
<body>

  <?php include "includes/header.php"; ?>

  <!-- PAGE HERO -->
  <section class="page-hero">
    <div class="page-hero-label">Our Offerings</div>
    <h1>Curated Beauty <em>Services</em></h1>
    <p>Every service we offer is a meticulously crafted ritual, combining artistry, technique, and the finest products for an unrivalled experience.</p>
  </section>

  <!-- FILTER TABS -->
  <div class="filter-section">
    <div class="container-fluid px-lg-5">
      <div class="filter-tabs">
        <button class="filter-tab active" onclick="filterSection('all', this)">All Services</button>
        <button class="filter-tab" onclick="filterSection('hair', this)">Hair</button>
        <button class="filter-tab" onclick="filterSection('skin', this)">Skin & Facials</button>
        <button class="filter-tab" onclick="filterSection('nails', this)">Nails</button>
        <button class="filter-tab" onclick="filterSection('wellness', this)">Wellness & Spa</button>
        <button class="filter-tab" onclick="filterSection('bridal', this)">Bridal</button>
      </div>
    </div>
  </div>

  <!-- HAIR SERVICES -->
  <section class="service-section" id="hair">
    <div class="container-fluid px-lg-5">
      <div class="row align-items-center mb-5 g-4">
        <div class="col-lg-5">
          <div class="cat-image">
            <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Hair Services" />
            <div class="cat-image-overlay"></div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="category-header">
            <div class="cat-label"><i class="bi bi-scissors"></i> Category</div>
            <h2 class="cat-title">Hair <em>Artistry</em></h2>
            <p class="cat-desc">From precision cuts to transformative colour treatments, our hair specialists bring your vision to life with international-standard technique.</p>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="popular-badge">Popular</div>
            <div class="svc-card-top"><span class="svc-duration">60 min</span><i class="bi bi-scissors svc-icon"></i></div>
            <h5>Signature Cut & Style</h5>
            <p>Precision haircut tailored to your face shape, finished with a blowout and style by our senior artisans.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 3,500 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">120–180 min</span><i class="bi bi-palette svc-icon"></i></div>
            <h5>Balayage & Highlights</h5>
            <p>Hand-painted colour technique for a natural, sun-kissed look with seamless blending and dimension.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 12,000 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">90 min</span><i class="bi bi-droplet svc-icon"></i></div>
            <h5>Keratin Treatment</h5>
            <p>Brazilian keratin smoothing that eliminates frizz, adds shine, and provides up to 4 months of silky results.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 9,000 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">45 min</span><i class="bi bi-wind svc-icon"></i></div>
            <h5>Blowout & Finish</h5>
            <p>Professional blowdry with styling products for a voluminous, polished look that lasts the week.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 2,200 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">30 min</span><i class="bi bi-stars svc-icon"></i></div>
            <h5>Deep Conditioning Mask</h5>
            <p>Intensive repair treatment restoring moisture, elasticity, and luminous shine to damaged or dry hair.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 1,800 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">150 min</span><i class="bi bi-brush svc-icon"></i></div>
            <h5>Full Colour + Cut</h5>
            <p>Complete colour transformation package including toning, cut, blowout, and finishing treatment.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 15,000 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SKIN SERVICES -->
  <section class="service-section" id="skin">
    <div class="container-fluid px-lg-5">
      <div class="row align-items-center mb-5 g-4 flex-row-reverse">
        <div class="col-lg-5">
          <div class="cat-image">
            <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80" alt="Skin Services" />
            <div class="cat-image-overlay"></div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="category-header">
            <div class="cat-label"><i class="bi bi-heart"></i> Category</div>
            <h2 class="cat-title">Skin & <em>Facials</em></h2>
            <p class="cat-desc">Scientifically-backed skin treatments curated for your unique skin type, delivering visible results and radiant, healthy skin.</p>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="popular-badge">Best Seller</div>
            <div class="svc-card-top"><span class="svc-duration">75 min</span><i class="bi bi-gem svc-icon"></i></div>
            <h5>Signature Glow Facial</h5>
            <p>Deep cleansing, exfoliation, and vitamin C brightening mask for immediate, luminous results.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 4,500 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">60 min</span><i class="bi bi-moisture svc-icon"></i></div>
            <h5>Hydra Dermabrasion</h5>
            <p>Non-invasive treatment that cleanses, exfoliates, and infuses serums simultaneously for plump, dewy skin.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 7,000 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">45 min</span><i class="bi bi-sunglasses svc-icon"></i></div>
            <h5>Anti-Ageing Ritual</h5>
            <p>Targeted firming and collagen-boosting treatment reducing fine lines and restoring youthful radiance.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 8,500 <span>/ session</span></div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NAILS SERVICES -->
  <section class="service-section" id="nails">
    <div class="container-fluid px-lg-5">
      <div class="row align-items-center mb-5 g-4">
        <div class="col-lg-5">
          <div class="cat-image">
            <img src="https://images.unsplash.com/photo-1604654894610-df63bc536371?w=800&q=80" alt="Nail Services" />
            <div class="cat-image-overlay"></div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="category-header">
            <div class="cat-label"><i class="bi bi-brush"></i> Category</div>
            <h2 class="cat-title">Nail <em>Artistry</em></h2>
            <p class="cat-desc">Flawless manicures, pedicures, and intricate nail art that express your personal aesthetic with lasting precision.</p>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-sm-6 col-lg-3">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">60 min</span><i class="bi bi-stars svc-icon"></i></div>
            <h5>Luxury Manicure</h5>
            <p>Cuticle care, shape, buff, and polish with OPI or Essie formulas.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 1,800</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="svc-card">
            <div class="popular-badge">Popular</div>
            <div class="svc-card-top"><span class="svc-duration">75 min</span><i class="bi bi-gem svc-icon"></i></div>
            <h5>Gel Extension Set</h5>
            <p>Full gel extension with builder gel for a chip-free, glamorous finish for 3+ weeks.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 3,500</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">90 min</span><i class="bi bi-brush svc-icon"></i></div>
            <h5>Nail Art Design</h5>
            <p>Custom hand-painted designs, 3D art, foils, and intricate patterns crafted to your vision.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 2,500</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">90 min</span><i class="bi bi-droplet svc-icon"></i></div>
            <h5>Spa Pedicure</h5>
            <p>Foot soak, exfoliation, massage, and polish in a luxurious relaxing ritual.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 2,800</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- WELLNESS SERVICES -->
  <section class="service-section" id="wellness">
    <div class="container-fluid px-lg-5">
      <div class="row mb-5">
        <div class="col-lg-5">
          <div class="cat-label"><i class="bi bi-flower1"></i> Category</div>
          <h2 class="cat-title">Wellness & <em>Spa</em></h2>
          <p class="cat-desc">Holistic treatments for body and soul that melt away stress and restore your inner equilibrium.</p>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">120 min</span><i class="bi bi-flower1 svc-icon"></i></div>
            <h5>Aromatherapy Massage</h5>
            <p>Full-body Swedish massage with essential oil blends selected for your mood and needs.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 6,500</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="popular-badge">Signature</div>
            <div class="svc-card-top"><span class="svc-duration">240 min</span><i class="bi bi-stars svc-icon"></i></div>
            <h5>Full Spa Ritual</h5>
            <p>Our crown jewel — facial, body scrub, massage, mani, pedi in one blissful 4-hour journey.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 12,000</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">60 min</span><i class="bi bi-heart svc-icon"></i></div>
            <h5>Hot Stone Therapy</h5>
            <p>Heated basalt stones melt muscle tension and improve circulation for deep restorative relaxation.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 5,500</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BRIDAL SERVICES -->
  <section class="service-section" id="bridal">
    <div class="container-fluid px-lg-5">
      <div class="row mb-5">
        <div class="col-lg-5">
          <div class="cat-label"><i class="bi bi-gem"></i> Category</div>
          <h2 class="cat-title">Bridal <em>Packages</em></h2>
          <p class="cat-desc">Your most important day deserves an extraordinary team. Our bridal specialists ensure you're breathtakingly beautiful.</p>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">3–4 hours</span><i class="bi bi-gem svc-icon"></i></div>
            <h5>Bridal Glam Package</h5>
            <p>Bridal hair styling, full makeup, eyebrows, lashes, and touch-up kit for the big day.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 25,000</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="popular-badge">Complete</div>
            <div class="svc-card-top"><span class="svc-duration">2 days</span><i class="bi bi-stars svc-icon"></i></div>
            <h5>Royal Bridal Experience</h5>
            <p>Pre-bridal facial, mehndi prep, Baraat look, Valima look — complete bridal journey over two days.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 55,000</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4">
          <div class="svc-card">
            <div class="svc-card-top"><span class="svc-duration">Trial</span><i class="bi bi-camera svc-icon"></i></div>
            <h5>Bridal Trial Session</h5>
            <p>Preview your bridal look in advance with a full makeup and hair trial to perfect every detail.</p>
            <div class="svc-price-row"><div class="svc-price">Rs. 8,000</div><a href="appointments.php" class="book-mini">Book <i class="bi bi-arrow-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PACKAGES -->
  <section class="section-packages">
    <div class="container-fluid px-lg-5">
      <div class="row mb-5">
        <div class="col-12 text-center">
          <div class="section-label justify-content-center">Memberships</div>
          <h2 class="section-title">Monthly <em>Packages</em></h2>
          <p style="color:var(--text-muted-light);max-width:500px;margin:0 auto;font-size:0.9rem;">Save more and treat yourself more often with our curated monthly membership plans.</p>
        </div>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="package-card">
            <div class="pkg-name">Silver Plan</div>
            <div class="pkg-title">Essential Care</div>
            <div class="pkg-price">Rs. 8,000 <small>/ month</small></div>
            <ul class="pkg-features">
              <li><i class="bi bi-check2"></i> 1 Haircut per month</li>
              <li><i class="bi bi-check2"></i> 1 Blowout per month</li>
              <li><i class="bi bi-check2"></i> 10% off all products</li>
              <li><i class="bi bi-check2"></i> Priority booking</li>
            </ul>
            <a href="appointments.php" class="btn-outline-gold">Get Started</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="package-card featured">
            <div class="popular-badge">Most Popular</div>
            <div class="pkg-name">Gold Plan</div>
            <div class="pkg-title">Luxury Monthly</div>
            <div class="pkg-price">Rs. 18,000 <small>/ month</small></div>
            <ul class="pkg-features">
              <li><i class="bi bi-check2"></i> 2 Haircuts per month</li>
              <li><i class="bi bi-check2"></i> 1 Facial treatment</li>
              <li><i class="bi bi-check2"></i> 1 Nail service</li>
              <li><i class="bi bi-check2"></i> 15% off all services</li>
              <li><i class="bi bi-check2"></i> Dedicated stylist</li>
            </ul>
            <a href="appointments.php" class="btn-gold">Get Started</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="package-card">
            <div class="pkg-name">Platinum Plan</div>
            <div class="pkg-title">Full Indulgence</div>
            <div class="pkg-price">Rs. 35,000 <small>/ month</small></div>
            <ul class="pkg-features">
              <li><i class="bi bi-check2"></i> Unlimited haircuts</li>
              <li><i class="bi bi-check2"></i> 2 Facials per month</li>
              <li><i class="bi bi-check2"></i> 2 Nail services</li>
              <li><i class="bi bi-check2"></i> 1 Massage</li>
              <li><i class="bi bi-check2"></i> 20% off all services</li>
              <li><i class="bi bi-check2"></i> Private cabin access</li>
            </ul>
            <a href="appointments.php" class="btn-outline-gold">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php include "includes/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function filterSection(id, btn) {
      document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      btn.classList.add('active');
      const sections = document.querySelectorAll('.service-section');
      if (id === 'all') {
        sections.forEach(s => s.style.display = '');
      } else {
        sections.forEach(s => { s.style.display = s.id === id ? '' : 'none'; });
      }
    }
  </script>
</body>
</html>
