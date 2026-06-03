<?php
include('../includes/connection.php');

if (isset($_POST['submit'])) {

    $book_name   = mysqli_real_escape_string($conn, $_POST['book_name']);
    $author_name = mysqli_real_escape_string($conn, $_POST['author_name']);
    $category    = mysqli_real_escape_string($conn, $_POST['category']);

    // PDF UPLOAD
    $pdf = $_FILES['pdf']['name'];
    $tmp_name = $_FILES['pdf']['tmp_name'];
    $fileType = $_FILES['pdf']['type'];

    // Check PDF
    if ($fileType != "application/pdf") {
        echo "❌ Sirf PDF file allowed hai!";
        exit();
    }

    if (empty($pdf)) {
        echo "❌ No PDF Selected";
        exit();
    }

    $pdfName = time() . "_" . basename($pdf);

    // Folder create
    $uploadDir = "../pdfs/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $target = $uploadDir . $pdfName;

    if (!move_uploaded_file($tmp_name, $target)) {
        echo "❌ PDF Upload Failed";
        exit();
    }

    // INSERT QUERY
    $stmt = mysqli_prepare($conn, "INSERT INTO pdfs (book_name, author_name, category, pdf) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $book_name, $author_name, $category, $pdfName);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: pdfs.php");
        exit();
    } else {
        echo "❌ Database Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add PDF</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #121211;
    color: white;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    justify-content: center;
    padding: 50px;
}

.form-container {
    background: #1a1a19;
    padding: 30px;
    width: 400px;
    border: 1px solid #333;
}

h2 {
    font-family: 'Playfair Display', serif;
    color: #c5a059;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background: #222;
    border: 1px solid #333;
    color: white;
}

input[type="submit"] {
    background: #c5a059;
    color: black;
    font-weight: bold;
    cursor: pointer;
    border: none;
}

input[type="submit"]:hover {
    opacity: 0.8;
}

       body {
            background: #121211;
            color: white;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        .form-container {
            background: #1a1a19;
            padding: 30px;
            width: 400px;
            border: 1px solid #333;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #c5a059;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            background: #222;
            border: 1px solid #333;
            color: white;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background: #c5a059;
            color: black;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            opacity: 0.8;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
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
</head>

<body>

<?php include '../includes/sidebar.php'; ?>

<div class="main-content">

    <div class="form-container">
        <h2>Add PDF</h2>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="book_name" placeholder="Book Name" required>

            <input type="text" name="author_name" placeholder="Author Name" required>

            <input type="text" name="category" placeholder="Category" required>

            <input type="file" name="pdf" accept="application/pdf" required>

            <input type="submit" name="submit" value="Upload PDF">

        </form>
    </div>

</div>

</body>
</html>