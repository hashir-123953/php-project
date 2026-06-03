<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login_page.php');
    exit();
}
include '../includes/connection.php';

// Total Clients
$clients = mysqli_query($conn, 'SELECT COUNT(*) as total FROM clients');
$clientsData = mysqli_fetch_assoc($clients);

// Total Appointments
$appointments = mysqli_query($conn, 'SELECT COUNT(*) as total FROM orders');
$appData = mysqli_fetch_assoc($appointments);

// Total Revenue
$revenue = mysqli_query($conn, 'SELECT SUM(amount) as total FROM payments');
$revData = mysqli_fetch_assoc($revenue);

$stock = mysqli_query($conn, 'SELECT COUNT(*) as total FROM inventory WHERE quantity < 5');
$stockData = mysqli_fetch_assoc($stock);

$recent = mysqli_query($conn, "
    SELECT *
    FROM orders
    WHERE created_at >= NOW() - INTERVAL 24 HOUR
    ORDER BY id DESC
    LIMIT 10
");
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Admin Dashboard | Readnova-E-BookStore</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    <link rel='stylesheet' href='../assets/style.css'>

    <style>
        :root {
            --primary-gold: #c5a059;
            --dark-sidebar: #0a0a0a;
            --dark-body: #121212;
            --card-bg: #1a1a1a;
            --text-muted: #888;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-body);
            color: #fff;
            margin: 0;
        }
        /* Main Content */
        #content {
            margin-left: 260px;
            padding: 30px;
            width: calc(100% - 260px);
        }

        /* Stats Cards */
        .stat-card {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .stat-card:hover {
            border-color: var(--primary-gold);
        }

        .stat-card h6 {
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-bottom: 10px;
        }

        .stat-card h2 {
            font-family: 'Playfair Display', serif;
            margin: 0;
            color: var(--primary-gold);
        }

        /* Table Styling */
        .custom-table {
            background: var(--card-bg);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 30px;
        }

        .table {
            color: #ddd;
            margin-bottom: 0;
        }

        .table thead {
            background: #222;
            color: var(--primary-gold);
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        .table td,
        .table th {
            border-color: rgba(255, 255, 255, 0.05);
            padding: 15px;
        }

        .badge-vip {
            background: rgba(197, 160, 89, 0.2);
            color: var(--primary-gold);
            border: 1px solid var(--primary-gold);
            padding: 5px 10px;
            border-radius: 0;
            font-size: 0.7rem;
        }

        /* Container styling for the logout link */
        .logout-btn {
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        /* The inner span styling */
        .logout-text {
            font-family: 'Montserrat', sans-serif;
            /* Matching the Jost/Montserrat clean look */
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #c5a059;
            /* The signature Gold color from the image */
            border: 1px solid rgba(197, 160, 89, 0.3);
            padding: 8px 16px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Hover effect to match the 'Login' button in the template */
        .logout-btn:hover .logout-text {
            background-color: #c5a059;
            color: #121211;
            /* Dark background color */
            border-color: #c5a059;
            box-shadow: 0 0 15px rgba(197, 160, 89, 0.2);
        }
    </style>
</head>

<body>

    <?php include '../includes/sidebar.php'; ?>

    <div id='content'>
        <div class='d-flex justify-content-between align-items-center mb-4'>
            <h2 style="font-family: 'Playfair Display';">Overview</h2>
            <div>
                <a href="../logout.php" class="logout-btn">
                    <span class="logout-text">
                        Logout
                    </span>
                </a>
            </div>
        </div>

        <div class='row g-4'>
            <div class='col-md-3'>
                <div class='stat-card text-center'>
                    <h6>TOTAL SALES</h6>
                    <h2> <?php echo $revData['total'] ?? 0;
                            ?></h2>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='stat-card text-center'>
                    <h6>TOTAL Orders</h6>
                    <h2> <?php echo $appData['total'];
                            ?></h2>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='stat-card text-center'>
                    <h6>TOTAL CLIENTS</h6>
                    <h2> <?php echo $clientsData['total'];
                            ?></h2>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='stat-card text-center'>
                    <h6>STOCK ALERT</h6>
                    <h2 class='text-danger'><?php echo $stockData['total'];
                                            ?></h2>
                </div>
            </div>
        </div>

        <div class='custom-table'>
            <div class='p-3 border-bottom border-secondary d-flex justify-content-between align-items-center'>
                <h5 class='m-0' style="font-family: 'Playfair Display';">Recent Orders</h5>
                <button class='btn btn-outline-warning btn-sm'>View All</button>
            </div>
            <table class='table table-dark table-hover'>
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Book Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($recent)) {
                    ?>
                        <tr>
                            <td><?php echo $row['name'];
                                ?></td>
                           
                            <td><?php echo $row['book_name'];
                                ?></td>
                            <td>
                                
                                    <?php echo $row['price'];
                                    ?>
                                
                            </td>
                            <td><i class='fas fa-ellipsis-v text-muted'></i></td>
                            <td><i class='fas fa-ellipsis-v text-muted'></i></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>