<?php
include "../includes/connection.php";
$result = mysqli_query($conn, "SELECT * FROM clients");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance Salon | Client Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,400&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
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
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 1100px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 40px;
            border-bottom: 1px solid var(--accent-border);
            padding-bottom: 20px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin: 0;
            font-weight: 400;
        }

        h2 span {
            color: var(--gold);
            font-style: italic;
        }

        .btn-add {
            background-color: var(--gold);
            color: #000;
            text-decoration: none;
            padding: 12px 24px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: opacity 0.3s ease;
        }

        .btn-add:hover {
            opacity: 0.8;
        }

        /* Table Styling */
        .table-wrapper {
            background: var(--card-bg);
            padding: 20px;
            border: 1px solid var(--accent-border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 2px;
            color: var(--gold);
            padding: 15px;
            border-bottom: 1px solid var(--accent-border);
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

        tr:hover td {
            color: var(--text-main);
            background-color: #222220;
        }

        /* Action Links */
        .action-links a {
            color: var(--gold);
            text-decoration: none;
            font-size: 0.8rem;
            margin: 0 5px;
            transition: border-bottom 0.3s;
            border-bottom: 1px solid transparent;
        }

        .action-links a:hover {
            border-bottom: 1px solid var(--gold);
        }

        .delete-link {
            color: #e74c3c !important;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <div>
            <p style="color: var(--gold); font-size: 0.7rem; letter-spacing: 3px; margin-bottom: 10px;">ADMINISTRATION</p>
            <h2>Client <span>Directory</span></h2>
        </div>
        <a href="add_client.php" class="btn-add">Add New Client</a>
    </header>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td style="color: var(--gold); font-weight: 600;"><?php echo $row['id']; ?></td>
                    <td style="color: var(--text-main);"><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td class="action-links">
                        <a href="edit_client.php?id=<?php echo $row['id']; ?>">EDIT</a>
                        <span style="color: #444;">|</span>
                        <a href="delete_client.php?id=<?php echo $row['id']; ?>" class="delete-link" onclick="return confirm('Are you sure?')">DELETE</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>