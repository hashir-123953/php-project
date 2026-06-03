<?php 
include('../includes/connection.php');  

$query = "SELECT * FROM feedback"; 
$result = mysqli_query($conn, $query); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Feedback</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

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
            padding: 20px;
            font-size: 22px;
            font-family: 'Playfair Display', serif;
            color: var(--gold);
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
            color: var(--gold);
        }

        #sidebar .nav-link:hover {
            background-color: #1a1a19;
            color: #ffffff;
        }

        #sidebar .nav-link.active {
            background-color: #1a1a19;
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
            margin: 0;
        }

        h2 span {
            color: var(--gold);
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            background: var(--card-bg);
            padding: 20px;
            border: 1px solid var(--accent-border);
            border-radius: 6px;
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

        .delete-link {
            color: red;
            text-decoration: none;
        }

        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<?php include '../includes/sidebar.php'; ?>

<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-box">

        <header>
            <h2>Read <span>Feedback</span></h2>
        </header>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>

                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                    <td>
                        <a href="delete_feedback.php?id=<?php echo $row['id']; ?>" 
                           class="delete-link"
                           onclick="return confirm('Do you want to delete this feedback?')">
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