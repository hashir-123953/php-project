<?php
include('../includes/connection.php');

$query = "SELECT * FROM winners";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Winners</title>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,400&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">

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
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: #0a0a0a;
            border-right: 1px solid #222;
            overflow-y: auto;
        }

        #sidebar .sidebar-header {
            padding: 25px 20px;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: var(--gold);
        }

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

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 260px;
            padding: 40px;
        }

        .container-box {
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

        .btn-add {
            background: var(--gold);
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 12px;
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            background: var(--card-bg);
            padding: 20px;
            border: 1px solid var(--accent-border);
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
        }

        td {
            padding: 15px;
            color: var(--text-dim);
            border-bottom: 1px solid #252524;
        }

        tr:hover td {
            background: #222;
            color: #fff;
        }

        img {
            border-radius: 6px;
        }

        /* ACTION LINKS */
        .action-links a {
            color: var(--gold);
            margin-right: 10px;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
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

    </style>
</head>

<body>

<!-- SIDEBAR -->
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN -->
<div class="main-content">
    <div class="container-box">

        <header>
            <h2>Manage <span>Winners</span></h2>
            <a href="addwinner.php" class="btn-add">+ Add Winner</a>
        </header>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="../img/<?php echo $row['image']; ?>" width="60"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td class="action-links">
                        <a href="edit_winner.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="deletewinner.php?id=<?php echo $row['id']; ?>" class="delete-link"
                           onclick="return confirm(' Do you wants to Delete?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>

</body>
</html>