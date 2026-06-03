<?php
include('../includes/connection.php');

$id = $_GET['id'];

/* FETCH DATA */
$query = "SELECT * FROM carousel WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

/* UPDATE */
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];

    // IMAGE UPDATE (optional)
    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        $imageName = time() . "_" . $image;
        move_uploaded_file($tmp, "../images/" . $imageName);

        $update = "UPDATE carousel 
                   SET title='$title', description='$description', image='$imageName'
                   WHERE id=$id";

    } else {

        $update = "UPDATE carousel 
                   SET title='$title', description='$description'
                   WHERE id=$id";
    }

    mysqli_query($conn, $update);

    header("Location: manage_carousel.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Carousel</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>

<style>

:root {
    --bg-color: #121211;
    --card-bg: #1a1a19;
    --gold: #c5a059;
    --text-main: #ffffff;
    --text-dim: #a0a0a0;
    --border: #333;
}

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

/* CARD */
.form-card {
    background: var(--card-bg);
    padding: 30px;
    border-radius: 12px;
    border: 1px solid var(--border);
    max-width: 600px;
}

/* HEADING */
h2 {
    font-family: 'Playfair Display', serif;
    margin-bottom: 25px;
}

h2 span {
    color: var(--gold);
}

/* INPUT */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 6px;
    color: var(--gold);
    font-size: 13px;
}

input, textarea {
    width: 100%;
    padding: 12px;
    background: #1e1e1e;
    border: 1px solid #333;
    color: #fff;
    border-radius: 5px;
}

/* BUTTON */
.btn-main {
    background: var(--gold);
    color: #000;
    border: none;
    padding: 12px;
    width: 100%;
    font-weight: bold;
    border-radius: 5px;
    margin-top: 10px;
}

.btn-main:hover {
    background: #e0b96a;
}

img {
    margin-top: 10px;
    border-radius: 6px;
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

    <h2>Edit <span>Carousel</span></h2>

    <div class="form-card">

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4" required><?php echo $row['description']; ?></textarea>
            </div>

            <div class="form-group">
                <label>Current Image</label><br>
                <img src="../images/<?php echo $row['image']; ?>" width="120">
            </div>

            <div class="form-group">
                <label>Change Image</label>
                <input type="file" name="image">
            </div>

            <button type="submit" name="update" class="btn-main">
                Update Carousel
            </button>

        </form>

    </div>

</div>

</body>
</html>