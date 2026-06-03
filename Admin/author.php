<?php
include('../includes/connection.php');

// ✅ AUTHOR ADD
if (isset($_POST['add_author'])) {
    $name  = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $bio   = mysqli_real_escape_string($conn, trim($_POST['bio']));

    if (!empty($name)) {
        $check = mysqli_query($conn, "SELECT * FROM authors WHERE name = '$name'");
        if (mysqli_num_rows($check) > 0) {
            $error = "⚠️ Yeh author pehle se exist karta hai!";
        } else {
            mysqli_query($conn, "INSERT INTO authors (name, email, bio) 
                                 VALUES ('$name', '$email', '$bio')");
            $success = "✅ Author successfully add ho gaya!";
        }
    } else {
        $error = "⚠️ Author ka naam khali nahi ho sakta!";
    }
}

// ✅ AUTHOR DELETE
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM authors WHERE id = $id");
    header("Location: authors.php");
    exit();
}

// Initials banana ke liye function
function getInitials($name) {
    $words = explode(' ', trim($name));
    $initials = '';
    foreach ($words as $word) {
        $initials .= strtoupper(substr($word, 0, 1));
    }
    return substr($initials, 0, 2);
}

// Avatar colors array
$avatarColors = [
    ['bg' => '#1a3a5a', 'color' => '#6ab0f5'],
    ['bg' => '#1a3a1a', 'color' => '#5fba5f'],
    ['bg' => '#3a2a0a', 'color' => '#d4a050'],
    ['bg' => '#3a1a3a', 'color' => '#d46ad4'],
    ['bg' => '#1a3a3a', 'color' => '#50d4c8'],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Authors</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            background: #121211;
            color: white;
            font-family: 'Montserrat', sans-serif;
            padding: 40px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            font-size: 28px;
            margin-bottom: 30px;
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

        .form-box input[type="text"],
        .form-box input[type="email"],
        .form-box textarea {
            width: 100%;
            padding: 10px 12px;
            background: #222;
            border: 1px solid #333;
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            margin-bottom: 16px;
        }

        .form-box textarea {
            height: 90px;
            resize: vertical;
        }

        .form-box input:focus,
        .form-box textarea:focus {
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

        /* ── AVATAR ── */
        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .author-info { display: flex; align-items: center; gap: 12px; }
        .author-name { font-weight: bold; font-size: 14px; }
        .author-email { font-size: 12px; color: #888; margin-top: 2px; }

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

<h2>Manage Authors</h2>

<div class="layout">

    <!-- ── ADD FORM ── -->
    <div class="form-box">
        <h3>Add New Author</h3>

        <?php if (isset($success)) echo "<div class='msg-success'>$success</div>"; ?>
        <?php if (isset($error))   echo "<div class='msg-error'>$error</div>"; ?>

        <form method="POST">
            <label>Full Name *</label>
            <input type="text" name="name" placeholder="e.g. Paulo Coelho" required
                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

            <label>Email (Optional)</label>
            <input type="text" name="email" placeholder="author@example.com"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

            <label>Bio (Optional)</label>
            <textarea name="bio" placeholder="Author ke baare mein likhein..."><?php echo isset($_POST['bio']) ? htmlspecialchars($_POST['bio']) : ''; ?></textarea>

            <button type="submit" name="add_author" class="btn-submit">Add Author</button>
        </form>
    </div>

    <!-- ── AUTHORS TABLE ── -->
    <div>
        <table>
            <thead>
                <tr>
                    <th style="width:50px;">#</th>
                    <th>Author</th>
                    <th style="width:90px;">Books</th>
                    <th style="width:160px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "
                    SELECT a.id, a.name, a.email, a.bio, COUNT(b.id) AS book_count
                    FROM authors a
                    LEFT JOIN books b ON b.author_id = a.id
                    GROUP BY a.id
                    ORDER BY a.id DESC
                ");

                $total = mysqli_num_rows($result);

                if ($total > 0):
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)):
                        $initials = getInitials($row['name']);
                        $colorSet = $avatarColors[($i - 1) % count($avatarColors)];
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>
                        <div class="author-info">
                            <div class="avatar" style="background:<?php echo $colorSet['bg']; ?>; color:<?php echo $colorSet['color']; ?>;">
                                <?php echo $initials; ?>
                            </div>
                            <div>
                                <div class="author-name"><?php echo htmlspecialchars($row['name']); ?></div>
                                <div class="author-email">
                                    <?php echo !empty($row['email']) ? htmlspecialchars($row['email']) : 'Email nahi di'; ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge"><?php echo $row['book_count']; ?></span></td>
                    <td>
                        <a href="edit_author.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="authors.php?delete=<?php echo $row['id']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Kya aap is author ko delete karna chahte hain?')">Delete</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                    <tr><td colspan="4" class="empty-msg">Koi author nahi mila. Pehle add karein.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="total">Total authors: <?php echo $total; ?></p>
    </div>

</div>
</body>
</html>