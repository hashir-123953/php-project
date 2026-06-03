<?php
include("includes/connection.php");

$query  = "SELECT * FROM competitions ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$data = [];
while($row = mysqli_fetch_assoc($result)){
    $data[] = [
        "name"        => $row['name'],
        "title"       => $row['title'],
        "description" => $row['description'],
        "start_date"  => $row['start_date'],
        "end_date"    => $row['end_date'],
        "status"      => $row['status'],
        // "img"         => "img/" . ($row['image'] ?? "default.jpg")
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ReadNova - Competitions</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Jost:wght@200;300;400;500&display=swap" rel="stylesheet"/>

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #fff;
    color: #000;
}

/* TITLE */
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

/* CARD */
.comp-card {
    border: 1px solid #ccc;
    padding: 20px;
    text-align: center;
    border-radius: 20px;
    background: #fff;
    transition: 0.3s;
}

.comp-card:hover {
    transform: translateY(-5px);
    border-color: #000;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* IMAGE */
.img-box {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 15px;
    border: 3px solid #000;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* TEXT */
.comp-card h5 {
    font-weight: 600;
}

.small-text {
    font-size: 13px;
    color: #555;
}

/* STATUS */
.status {
    display: inline-block;
    padding: 4px 12px;
    font-size: 12px;
    border-radius: 20px;
    font-weight: bold;
    margin-top: 5px;
}

.active { background: #d4edda; color: #155724; }
.upcoming { background: #fff3cd; color: #856404; }
.closed { background: #f8d7da; color: #721c24; }
</style>
</head>

<body>

<?php include "includes/header.php"; ?>

<div class="container">

<h2 class="section-title"> Competitions</h2>

<?php if(empty($data)): ?>
    <div class="text-center text-muted py-5">
        No competitions found
    </div>
<?php else: ?>

<div class="row g-4">

<?php foreach($data as $c): ?>
<div class="col-md-4">

    <div class="comp-card">

        <!-- <div class="img-box">
            <img src="<?= htmlspecialchars($c['img']) ?>" 
                 onerror="this.src='img/default.jpg'">
        </div> -->

        <h5><?= htmlspecialchars($c['name']) ?></h5>
        <p><?= htmlspecialchars($c['title']) ?></p>

        <p class="small-text">
            <?= htmlspecialchars($c['description']) ?>
        </p>

        <p class="small-text">
            <b>Start:</b> <?= $c['start_date'] ?><br>
            <b>End:</b> <?= $c['end_date'] ?>
        </p>

        <span class="status <?= strtolower($c['status']) ?>">
            <?= strtoupper($c['status']) ?>
        </span>

    </div>

</div>
<?php endforeach; ?>

</div>

<?php endif; ?>

</div>

<?php include "includes/footer.php"; ?>

</body>
</html>