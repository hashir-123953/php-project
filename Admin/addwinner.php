<?php  
include "../includes/connection.php";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "../img/".$img);

    mysqli_query($conn, "INSERT INTO winners(name,title,description,image)
    VALUES('$name','$title','$desc','$img')");

    header("Location: read_winner.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Winner</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

<style>
:root {
    --bg-color: #121211;
    --card-bg: #1a1a19;
    --gold: #c5a059;
    --text-main: #ffffff;
    --border: #333;
}

/* BODY */
body {
    margin: 0;
    background: var(--bg-color);
    color: var(--text-main);
    font-family: 'Montserrat', sans-serif;
}

/* SIDEBAR */
#sidebar {
    position: fixed;
    width: 260px;
    height: 100vh;
    background: #0a0a0a;
    border-right: 1px solid #222;
}

/* MAIN */
.main-content {
    margin-left: 260px;
    padding: 40px;
}

/* HEADER */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid var(--border);
    margin-bottom: 30px;
    padding-bottom: 10px;
}

h2 {
    font-family: 'Playfair Display', serif;
}

h2 span {
    color: var(--gold);
}

/* FORM CARD */
.form-container {
    background: var(--card-bg);
    padding: 30px;
    width: 420px;
    border: 1px solid var(--border);
    border-radius: 10px;
}

/* 🔥 HOVER EFFECT (same winners style) */
.form-container:hover {
    transform: scale(1.02);
    transition: 0.3s ease;
}

/* INPUTS */
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background: #222;
    border: 1px solid #333;
    color: white;
}

/* BUTTON */
button {
    width: 100%;
    padding: 10px;
    background: var(--gold);
    color: black;
    border: none;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    opacity: 0.85;
}

/* SIDEBAR LINKS */
#sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #ccc;
    text-decoration: none;
    transition: 0.3s;
}

#sidebar .nav-link i {
    color: var(--gold);
}

#sidebar .nav-link:hover {
    background: #1a1a19;
    color: #fff;
}

#sidebar .nav-link.active {
    background: #1a1a19;
    color: var(--gold);
    border-left: 3px solid var(--gold);
}
 /* SIDEBAR */
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background-color: #0a0a0a;
    overflow-y: auto;
    border-right: 1px solid #222;
}

/* HEADER */
#sidebar .sidebar-header {
    padding: 20px;
    font-size: 22px;
    font-family: 'Playfair Display', serif;
    color: #c5a059;
    border-bottom: 1px solid #222;
}

/* SECTION LABEL */
#sidebar .section-label {
    color: #888;
    font-size: 11px;
    letter-spacing: 2px;
    padding: 15px 20px 5px;
}

/* LINKS */
#sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #ccc;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease;
}

/* ICONS */
#sidebar .nav-link i {
    color: #c5a059;
}

/* HOVER EFFECT (old style) */
#sidebar .nav-link:hover {
    background-color: #1a1a19;
    color: #ffffff;
}

/* ACTIVE LINK */
#sidebar .nav-link.active {
    background-color: #1a1a19;
    color: #c5a059;
    border-left: 3px solid #c5a059;
}
.main-content {
    margin-left: 260px;
    padding: 40px;
}
</style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

<header>
    <h2>Add <span>Winner</span></h2>
</header>

<div class="form-container">

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="name" placeholder="Name" required>

    <input type="text" name="title" placeholder="Title" required>

    <input type="text" name="description" placeholder="Description" required>

    <input type="file" name="image" required>

    <button type="submit" name="submit">Add Winner</button>

</form>

</div>

</div>

</body>
</html>