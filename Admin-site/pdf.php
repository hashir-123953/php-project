<?php
include('../includes/connection.php');

$query = "SELECT * FROM pdf";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage PDFs</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display&display=swap" rel="stylesheet">
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

    .main-content {
        margin-left: 260px;
        padding: 40px;
    }

    .my-container {
        max-width: 1100px;
    }

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
        border-radius: 6px;
    }

    .table-wrapper {
        background: var(--card-bg);
        padding: 20px;
        border-radius: 12px;
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
        background: rgba(197, 160, 89, 0.15);
        color: #fff;
    }

    .action-links a {
        color: var(--gold);
        margin-right: 10px;
        text-decoration: none;
    }

    .delete-link {
        color: red;
    }
    
/* SIDEBAR LINKS */
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
            <h2>Manage <span>PDFs</span></h2>
            <a href="add_pdf.php" class="btn-add">+ Add PDF</a>
        </header>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>PDF</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['author_name']; ?></td>
                    <td><?php echo $row['category']; ?></td>

                
 <td>
   
    <a href="../pdf/<?= trim($row['pdf']) ?>" target="_blank" 
       onclick="return !window.open(this.href)">
        View PDF
    </a>
</td>


                    <td class="action-links">
                        <a href="edit_pdf.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete_pdf.php?id=<?php echo $row['id']; ?>" class="delete-link"
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