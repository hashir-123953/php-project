<?php
include('../includes/connection.php');

// DELETE BOOK
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    // Pehle image ka naam lo
    $result = mysqli_query($conn, "SELECT image FROM books WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // Image file delete karo
    if (!empty($row['image'])) {
        $imagePath = "../images/" . $row['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Database se delete karo
    mysqli_query($conn, "DELETE FROM books WHERE id = $id");
    header("Location: books.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Books</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #121211;
            color: white;
            font-family: 'Montserrat', sans-serif;
            padding: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            font-size: 28px;
        }

        .btn-add {
            background: #c5a059;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-add:hover { opacity: 0.85; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1a1a19;
        }

        thead tr {
            background: #222;
            color: #c5a059;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #2a2a28;
            font-size: 14px;
        }

        tbody tr:hover { background: #1f1f1e; }

        .book-img {
            width: 45px;
            height: 60px;
            object-fit: cover;
            border: 1px solid #333;
        }

        .no-image {
            width: 45px;
            height: 60px;
            background: #2a2a28;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #666;
        }

        .btn-edit {
            background: #1a4a7a;
            color: #6ab0f5;
            padding: 6px 14px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
            margin-right: 6px;
        }

        .btn-delete {
            background: #4a1a1a;
            color: #f56a6a;
            padding: 6px 14px;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-edit:hover { opacity: 0.8; }
        .btn-delete:hover { opacity: 0.8; }

        .total {
            margin-top: 15px;
            font-size: 13px;
            color: #888;
        }

        .empty-msg {
            text-align: center;
            padding: 40px;
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Manage Books</h2>
    <a href="add_book.php" class="btn-add">+ Add Book</a>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td>
                <?php if (!empty($row['image']) && file_exists("../images/" . $row['image'])): ?>
                    <img src="../images/<?php echo htmlspecialchars($row['image']); ?>" class="book-img">
                <?php else: ?>
                    <div class="no-image">No Img</div>
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['author']); ?></td>
            <td>Rs. <?php echo number_format($row['price'], 2); ?></td>
            <td>
                <a href="edit_book.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                <a href="books.php?delete=<?php echo $row['id']; ?>" 
                   class="btn-delete"
                   onclick="return confirm('Kya aap is book ko delete karna chahte hain?')">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="6" class="empty-msg">Koi book nahi mili. Pehle book add karein.</td></tr>';
        }
        ?>
    </tbody>
</table>

<p class="total">Total books: <?php echo $count; ?></p>

</body>
</html>