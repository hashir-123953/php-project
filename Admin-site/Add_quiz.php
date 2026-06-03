<?php
include('../includes/connection.php');

if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // IMAGE UPLOAD
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    if (empty($image)) {
        echo "❌ No Image Selected";
        exit();
    }

    if (!in_array($fileType, $allowedTypes)) {
        echo "❌ Sirf JPG, PNG, GIF, WEBP images allowed hain!";
        exit();
    }

    $imageName = time() . "_" . basename($image);

    $uploadDir = "../images/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $target = $uploadDir . $imageName;

    if (!move_uploaded_file($tmp_name, $target)) {
        echo "❌ Image Upload Failed";
        exit();
    }

     $checkQuery = mysqli_prepare($conn, "SELECT * FROM quiz WHERE title = ?");
    mysqli_stmt_bind_param($checkQuery, "s", $title);
    mysqli_stmt_execute($checkQuery);

    mysqli_stmt_store_result($checkQuery);

    if (mysqli_stmt_num_rows($checkQuery) > 0) {

        echo "❌ Ye book  quiz pehle se database me mojood hai!";
        exit();

    }

    mysqli_stmt_close($checkQuery);
    // INSERT INTO NOVELS TABLE
    $stmt = mysqli_prepare($conn, "INSERT INTO quiz(title, author, price, image) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssds", $title, $author, $price, $imageName);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: novels.php");
        exit();
    } else {
        echo "❌ Database Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Qiuz</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;500;600&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>

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
        <?php if(!empty($error)) { ?>

    <p class="error"><?php echo $error; ?></p>

<?php } ?>

        <h2>Add Quiz-Books</h2>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="title" placeholder="Quiz Title" required>

            <input type="text" name="author" placeholder="Author Name" required>

            <input type="number" name="price" placeholder="Price" step="0.01" min="0" required>

            <input type="file" name="image" accept="image/*" required>

            <input type="submit" name="submit" value="Add Novel">

        </form>

    </div>

</div>

</body>
</html>