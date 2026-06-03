<?php
include('../includes/connection.php');

/* FETCH CAROUSEL DATA */
$query = "SELECT * FROM carousel ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Carousel</title>

    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- ICONS -->
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

/* SIDEBAR */
#sidebar {
    position: fixed !important;
    top: 0;
    left: 0;
    width: 260px;
    height: 100vh;
    background: #0a0a0a;
    border-right: 1px solid #222;
    overflow-y: auto;
}

/* MAIN */
.main-content {
    margin-left: 260px;
    padding: 40px;
}

.my-container {
    max-width: 1100px;
}

/* HEADER */
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
}

/* TABLE */
.table-wrapper {
    background: var(--card-bg);
    padding: 20px;
    border: 1px solid var(--accent-border);
    border-radius: 12px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    color: var(--gold);
    font-size: 12px;
    padding: 15px;
    border-bottom: 1px solid var(--accent-border);
}

td {
    padding: 15px;
    color: var(--text-dim);
    border-bottom: 1px solid #252524;
}

tr:hover td {
    background: rgba(197, 160, 89, 0.15);
    color: #fff;
}

/* IMAGE */
img {
    border-radius: 6px;
}

/* ACTION */
.action-links a {
    color: var(--gold);
    margin-right: 10px;
    text-decoration: none;
}

.delete-link {
    color: red;
}

#sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #ccc;
    text-decoration: none;
}

#sidebar .nav-link:hover {
    background-color: #1a1a19;
    color: #ffffff;
}

#sidebar .nav-link.active {
    background-color: #1a1a19;
    color: #c5a059;
    border-left: 3px solid #c5a059;
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

        #sidebar .sidebar-header {
            padding: 20px;
            font-size: 22px;
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            border-bottom: 1px solid #222;
        }

        #sidebar .section-label {
            color: #888;
            font-size: 11px;
            letter-spacing: 2px;
            padding: 15px 20px 5px;
        }

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

        #sidebar .nav-link i {
            color: #c5a059;
        }

        #sidebar .nav-link:hover {
            background-color: #1a1a19;
            color: #ffffff;
        }

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
            <h2>Manage <span>Carousel</span></h2>
            <a href="addcarosel.php" class="btn-add">+ Add Slide</a>
        </header>

        <div class="table-wrapper">
            <table>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>

                    <td>
                        <img src="../images/<?php echo $row['image']; ?>" width="80">
                    </td>

                    <td><?php echo $row['title']; ?></td>

                    <td><?php echo $row['description']; ?></td>

                    <td class="action-links">
                        <a href="edit_carousel.php?id=<?php echo $row['id']; ?>">Edit</a>

                        <a href="delete_carousel.php?id=<?php echo $row['id']; ?>"
                           class="delete-link"
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </table>
        </div>

    </div>
</div>

</body>
</html>