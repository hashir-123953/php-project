<?php
include "../includes/connection.php";

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// Apni website ki users table se data lo
$sql = "SELECT * FROM clients ORDER BY id DESC";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Activity</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

<style>
    #sidebar {
    position: fixed;   /* 👈 MOST IMPORTANT */
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background-color: #0a0a0a;
    overflow-y: auto;
    padding-top: 20px;
     position: fixed;
}
     :root {
    --bg-color: #121211;
    --card-bg: #1a1a19;
    --primary-gold: #c5a059;
    --text-main: #ffffff;
    --text-dim: #a0a0a0;
    --accent-border: #333330;
}

body {
    background-color: var(--bg-color);
    color: var(--text-main);
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    max-width: 1100px;
}

/* Header */
h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem;
    margin-bottom: 30px;
}

h2 span {
    color: var(--primary-gold);
    font-style: italic;
}

/* Table Wrapper */
.table-wrapper {
    background: var(--card-bg);
    padding: 20px;
    border: 1px solid var(--accent-border);
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
}

th {
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 2px;
    color: var(--primary-gold);
    padding: 15px;
    border-bottom: 1px solid var(--accent-border);
    text-align: left;
}

td {
    padding: 20px 15px;
    font-size: 0.9rem;
    color: var(--text-dim);
    border-bottom: 1px solid #252524;
}

tr:last-child td {
    border-bottom: none;
}

/* Hover effect (premium look) */
tr:hover td {
    background-color: #222220;
    color: var(--text-main);
}

/* Status */
.active {
    color: #4ade80;
    font-weight: 600;
}

.inactive {
    color: #f87171;
    font-weight: 600;
}

/* Layout fix (sidebar space) */
.main-content {
    margin-left: 260px;
    padding: 40px;
}
/* SIDEBAR FULL DESIGN */
#sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background: #0a0a0a;
    padding-top: 20px;
    overflow-y: auto;
    border-right: 1px solid #222;
}

/* Header */
#sidebar .sidebar-header {
    padding: 20px;
    font-size: 22px;
    color: #c5a059;
    font-family: 'Playfair Display', serif;
}

/* Section labels */
#sidebar .section-label {
    color: #888;
    font-size: 11px;
    letter-spacing: 2px;
    padding: 15px 20px 5px;
}

/* Links */
#sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #ccc;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

/* Icons */
#sidebar .nav-link i {
    color: #c5a059;
}


tr:hover td {
    color: var(--text-main);
    background-color:  #c5a059;
    h2 span {
    color: var(--primary-gold);
}

th {
    color: var(--primary-gold);
}

.action-links a {
    color: var(--primary-gold);
}
}
.btn-add {
    background-color: var(--primary-gold);
}
#sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #ccc;
    text-decoration: none;
    font-size: 14px;
    transition: all 0.3s ease; /* 👈 smooth animation */
    border-left: 3px solid transparent;
}

/* ICON */
#sidebar .nav-link i {
    color: #c5a059;
    transition: 0.3s;
}

/* HOVER (smooth + clean) */
#sidebar .nav-link:hover {
    background: rgba(197, 160, 89, 0.08); /* 👈 light gold bg */
    color: #fff;
    border-left: 3px solid #c5a059;
}

/* ICON hover effect */
#sidebar .nav-link:hover i {
    transform: scale(1.1);
}

/* ACTIVE (selected page) */
#sidebar .nav-link.active {
    background: rgba(197, 160, 89, 0.12);
    color: #c5a059;
    border-left: 3px solid #c5a059;
}
</style>

</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
    <div class="container">
<h2>User Activity</h2>

<table>

<tr>
<th>User</th>
<th>Email</th>
<th>Status</th>
<th>Created Date</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
<!-- <?php
if($row['status']=="active"){
echo "<span class='active'>Active</span>";
}else{
echo "<span class='inactive'>Inactive</span>";
}
?> -->
</td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>


</table>

</div>

</body>
</html>