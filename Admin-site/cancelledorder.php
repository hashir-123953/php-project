<?php
include('../includes/connection.php');

/* DELETE ORDER */
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);

    $delete_query = "DELETE FROM orders WHERE id = '$delete_id'";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: manage_orders.php");
        exit();
    } else {
        echo "Delete Failed: " . mysqli_error($conn);
    }
}

/* TOTAL CANCELLED ORDERS */
$count_query = "SELECT COUNT(*) as total_canceled FROM orders WHERE status='canceled'";
$count_result = mysqli_query($conn, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_canceled = $count_row['total_canceled'];

/* FETCH ONLY CANCELLED ORDERS */
$query = "SELECT * FROM orders WHERE status='canceled' ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancelled Orders</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

    <style>
        body {
            background: #121211;
            color: white;
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

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

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
        }

        #sidebar .nav-link i {
            color: #c5a059;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
        }

        .page-box {
            background: #1a1a19;
            padding: 30px;
            border: 1px solid #333;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            margin-bottom: 10px;
            text-align: center;
        }

        .total-box {
            text-align: center;
            color: #c5a059;
            font-size: 18px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        table th {
            background: #111;
            color: #c5a059;
            padding: 14px;
            text-align: center;
            border: 1px solid #333;
        }

        table td {
            padding: 14px;
            text-align: center;
            border: 1px solid #333;
            background: #1f1f1f;
        }

        .btn-edit {
            background: #c5a059;
            color: black;
            padding: 6px 14px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 4px;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 6px 14px;
            text-decoration: none;
            font-weight: 600;
            border-radius: 4px;
        }
    </style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
    <div class="container">
        <div class="page-box">

            <h2>Cancelled Orders</h2>

            <div class="total-box">
                Total Cancelled Orders: <?php echo $total_canceled; ?>
            </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Book Name</th>
                    <th>Quantity</th>
                    <th>Author Name</th>
                    <th>Email</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Payment Method</th>
                    <th>Account Name</th>
                    <th>Account Number</th>
                    <th>Action</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['book_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['account_name']; ?></td>
                    <td><?php echo $row['account_number']; ?></td>
                    <td>
                        <a href="manage_orders.php?delete=<?php echo $row['id']; ?>" class="btn-delete"
                           onclick="return confirm('Are you sure?')">
                            Delete
                        </a>
                    </td>
                </tr>

                <?php
                    }
                } else {
                    echo "<tr><td colspan='13'>No Cancelled Orders Found</td></tr>";
                }
                ?>

            </table>

        </div>
    </div>
</div>

</body>
</html>