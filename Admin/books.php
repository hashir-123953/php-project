<?php
include('../includes/connection.php');
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        
        :root {
    --bg-color: #121211;
    --card-bg: #1a1a19;
    --gold: #c5a059;
    --text-main: #ffffff;
    --text-dim: #a0a0a0;
    --accent-border: #333330;
}

body {
    margin: 0;
    background: var(--bg-color);
    color: var(--text-main);
    font-family: 'Montserrat', sans-serif;
}

/* ===== SIDEBAR ===== */
#sidebar {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background: #0a0a0a;
    border-right: 1px solid #222;
    overflow-y: auto;
    z-index: 9999;
}

/* ===== MAIN ===== */
.main-content {
    margin-left: 260px;
    padding: 40px;
}

.my-container {
    max-width: 1100px;
}

/* ===== HEADER ===== */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    border-bottom: 1px solid var(--accent-border);
    padding-bottom: 15px;
}

h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
}

h2 span {
    color: var(--gold);
}

/* BUTTON */
.btn-add {
    background: var(--gold);
    color: #000;
    padding: 10px 20px;
    text-decoration: none;
    font-size: 12px;
    border-radius: 6px;
    transition: 0.3s;
}

.btn-add:hover {
    background: #e0b96a;
    transform: translateY(-2px);
}

/* ===== TABLE ===== */
.table-wrapper {
    background: var(--card-bg);
    padding: 20px;
    border: 1px solid var(--accent-border);
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    color: var(--gold);
    text-transform: uppercase;
    font-size: 12px;
    padding: 15px;
    border-bottom: 1px solid var(--accent-border);
    letter-spacing: 1px;
}

td {
    padding: 15px;
    color: var(--text-dim);
    border-bottom: 1px solid #252524;
    transition: 0.3s;
}

/* 🔥 PREMIUM ROW HOVER */
tr {
    transition: all 0.3s ease;
}

tr:hover td {
    background: rgba(197, 160, 89, 0.15);
    color: #fff;
}

tr:hover {
    transform: scale(1.01);
    box-shadow: 0 4px 15px rgba(197, 160, 89, 0.2);
}

/* IMAGE */
img {
    border-radius: 6px;
    transition: 0.3s;
}

tr:hover img {
    transform: scale(1.1);
}

/* ACTION */
.action-links a {
    color: var(--gold);
    margin-right: 10px;
    text-decoration: none;
    transition: 0.3s;
}

.action-links a:hover {
    color: #fff;
    text-shadow: 0 0 8px var(--gold);
}

.delete-link {
    color: red;
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
    <div class="my-container">

        <header>
            <h2>Manage <span>Books</span></h2>
            <a href="add_book.php" class="btn-add">+ Add Book</a>
        </header>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="../images/<?php echo $row['image']; ?>" width="60"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td class="action-links">
                        <a href="edit_book.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-link"
                           onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>

</body>
</html>