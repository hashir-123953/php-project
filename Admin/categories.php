<?php
include('../includes/connection.php');

// ✅ CATEGORY ADD
if (isset($_POST['add_category'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['category_name']));

    if (!empty($name)) {
        $check = mysqli_query($conn, "SELECT * FROM categories WHERE name = '$name'");
        if (mysqli_num_rows($check) > 0) {
            $error = "⚠️ Yeh category pehle se exist karti hai!";
        } else {
            mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')");
            $success = "✅ Category successfully add ho gayi!";
        }
    } else {
        $error = "⚠️ Category name khali nahi ho sakta!";
    }
}

// ✅ CATEGORY DELETE
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
    header("Location: categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>
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

        .layout {
            display: grid;
            grid-template-columns: 320px 1fr;
            gap: 25px;
            align-items: start;
        }

        /* ── ADD FORM ── */
        .form-box {
            background: #1a1a19;
            border: 1px solid #333;
            padding: 25px;
        }

        .form-box h3 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .form-box label {
            display: block;
            font-size: 12px;
            color: #888;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-box input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            background: #222;
            border: 1px solid #333;
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .form-box input[type="text"]:focus {
            outline: none;
            border-color: #c5a059;
        }

        .btn-submit {
            width: 100%;
            padding: 11px;
            background: #c5a059;
            color: black;
            font-weight: bold;
            font-size: 14px;
            border: none;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-submit:hover { opacity: 0.85; }

        .msg-success {
            background: #1a3a1a;
            color: #5fba5f;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 14px;
            border-left: 3px solid #5fba5f;
        }

        .msg-error {
            background: #3a1a1a;
            color: #f56a6a;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 14px;
            border-left: 3px solid #f56a6a;
        }

        /* ── TABLE ── */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1a1a19;
        }

        thead tr {
            background: #222;
            color: #c5a059;
            font-size: 12px;
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

        .badge {
            background: #1a3a5a;
            color: #6ab0f5;
            padding: 3px 10px;
            font-size: 12px;
            font-weight: bold;
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

        .btn-edit:hover, .btn-delete:hover { opacity: 0.8; }

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
    <h2>Manage Categories</h2>
</div>

<div class="layout">

    <!-- ── ADD FORM ── -->
    <div class="form-box">
        <h3>Add New Category</h3>

        <?php if (isset($success)) echo "<div class='msg-success'>$success</div>"; ?>
        <?php if (isset($error))   echo "<div class='msg-error'>$error</div>"; ?>

        <form method="POST">
            <label>Category Name</label>
            <input type="text" name="category_name" placeholder="e.g. Fiction" required>
            <button type="submit" name="add_category" class="btn-submit">Add Category</button>
        </form>
    </div>

    <!-- ── CATEGORIES TABLE ── -->
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width:50px;">#</th>
                    <th>Category Name</th>
                    <th style="width:90px;">Books</th>
                    <th style="width:150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Books count ke saath categories fetch karo
                $result = mysqli_query($conn, "
                    SELECT c.id, c.name, COUNT(b.id) AS book_count
                    FROM categories c
                    LEFT JOIN books b ON b.category_id = c.id
                    GROUP BY c.id
                    ORDER BY c.id DESC
                ");

                $total = mysqli_num_rows($result);

                if ($total > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><span class="badge"><?php echo $row['book_count']; ?></span></td>
                    <td>
                        <a href="edit_category.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="categories.php?delete=<?php echo $row['id']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Kya aap yeh category delete karna chahte hain?')">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="empty-msg">Koi category nahi mili. Pehle add karein.</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <p class="total">Total categories: <?php echo $total ?? 0; ?></p>
    </div>

</div>

</body>
</html>