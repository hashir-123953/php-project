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

/* FETCH ALL ORDERS */
$query = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders</title>

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

        .page-box {
            background: #1a1a19;
            padding: 30px;
            border: 1px solid #333;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            margin-bottom: 25px;
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

        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.8;
        }
        <style>
    body {
        background: #121211;
        color: white;
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
    }

    /* MAIN CONTENT */
    .main-content {
        margin-left: 260px;
        padding: 30px;
    }

    /* SMALLER ORDER BOX */
    .page-box {
        background: #1a1a19;
        padding: 25px;
        border: 1px solid #333;
        border-radius: 10px;
        width: 1500px;
        max-width: 2000px;   /* box choti */
        margin: auto;        /* center */
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }

    h2 {
        font-family: 'Playfair Display', serif;
        color: #c5a059;
        margin-bottom: 25px;
        font-size: 28px;
        text-align: center;
    }

    /* TABLE DESIGN */
    table {
        width: 100%;
        border-collapse: collapse;
        color: white;
        overflow: hidden;
        border-radius: 8px;
    }

    table th {
        background: #111;
        color: #c5a059;
        padding: 14px;
        text-align: center;
        border: 1px solid #333;
        font-size: 14px;
        white-space: nowrap;
    }

    table td {
        padding: 14px;
        text-align: center;
        border: 1px solid #333;
        background: #1f1f1f;
        font-size: 14px;
    }

    table tr:hover td {
        background: #252525;
        transition: 0.3s;
    }

    /* BUTTONS */
    .btn-edit {
        background: #c5a059;
        color: black;
        padding: 7px 16px;
        text-decoration: none;
        font-weight: 600;
        border-radius: 6px;
        display: inline-block;
        margin-right: 5px;
        font-size: 13px;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        padding: 7px 16px;
        text-decoration: none;
        font-weight: 600;
        border-radius: 6px;
        display: inline-block;
        font-size: 13px;
    }

    .btn-edit:hover,
    .btn-delete:hover {
        opacity: 0.85;
        transform: scale(1.03);
        transition: 0.3s;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .main-content {
            margin-left: 0;
            padding: 20px;
        }

        .page-box {
            width: 100%;
            padding: 20px;
        }

        table {
            font-size: 12px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 10px;
            font-size: 12px;
        }
    }
    .page-box {
    background: #1a1a19;
    padding: 30px;
    border: 1px solid #333330;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

/* HEADER */
table th {
    color: #c5a059;
    text-transform: uppercase;
    font-size: 12px;
    padding: 15px;
    border-bottom: 1px solid #333330;
    letter-spacing: 1px;
    background: transparent; /* remove dark box */
}

/* DATA */
table td {
    padding: 15px;
    color: #a0a0a0;
    border-bottom: 1px solid #252524; /* soft line */
    background: transparent; /* REMOVE BOX LOOK */
    transition: 0.3s;
}

/* HOVER EFFECT (same as books) */
table tr:hover td {
    background: rgba(197, 160, 89, 0.15);
    color: #fff;
}

table tr {
    transition: all 0.3s ease;
}

table tr:hover {
    transform: scale(1.01);
    box-shadow: 0 4px 15px rgba(197, 160, 89, 0.2);
}
</style>
    </style>
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">
    <div class="container">
        <div class="page-box">

            <h2>Manage Orders</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th> Name</th>
                    <th>Book Name</th>
                    <th>Quantity</th>
                    <th>Author Name</th>
                    <th>Email</th>
                    <th>price</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Account Name</th>
                    <th>Account number</th>
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
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['account_name']; ?></td>
                    <td><?php echo $row['account_number']; ?></td>
                    <td>
                        <a href="edit_order.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                            Edit
                        </a>

                        <a href="manage_orders.php?delete=<?php echo $row['id']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Are you sure you want to delete this order?')">
                            Delete
                        </a>
                    </td>
                </tr>

                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No Orders Found</td></tr>";
                }
                ?>

            </table>

        </div>
    </div>
</div>

</body>
</html>