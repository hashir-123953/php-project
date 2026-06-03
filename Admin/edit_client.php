<?php
// Navigating up one level to reach the includes folder
include "../includes/connection.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM clients WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE clients 
              SET name='$name', phone='$phone', email='$email' 
              WHERE id=$id";

    if(mysqli_query($conn, $query)){
        header("Location: clients.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegance Salon | Edit Client</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-card {
            background: var(--card-bg);
            border: 1px solid var(--accent-border);
            padding: 50px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header p {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin: 0;
            font-weight: 400;
        }

        h2 span {
            color: var(--gold);
            font-style: italic;
        }

        .input-group {
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 0.7rem;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--accent-border);
            color: var(--text-main);
            padding: 10px 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-bottom-color: var(--gold);
        }

        .btn-update {
            width: 100%;
            background-color: var(--gold);
            color: #000;
            border: none;
            padding: 15px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            margin-top: 20px;
            transition: opacity 0.3s;
        }

        .btn-update:hover {
            opacity: 0.9;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .back-link:hover {
            color: var(--gold);
        }
    </style>
</head>
<body>

<div class="form-card">
    <header>
        <p>Information Update</p>
        <h2>Edit <span>Profile</span></h2>
    </header>

    <form method="POST">
        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required value="<?php echo htmlspecialchars($data['name']); ?>">
        </div>

        <div class="input-group">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" id="phone" required value="<?php echo htmlspecialchars($data['phone']); ?>">
        </div>

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['email']); ?>">
        </div>

        <button type="submit" name="update" class="btn-update">Save Changes</button>
        
        <a href="clients.php" class="back-link">← DISCARD CHANGES</a>
    </form>
</div>

</body>
</html>