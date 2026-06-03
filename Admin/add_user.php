


<?php
include "../includes/connection.php";
 
$success = "";
$error   = "";
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email']    ?? '');
    $password = trim($_POST['password'] ?? '');
    $role     = $_POST['role']          ?? '';
 
    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        $error = "Tamam fields bharein.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email format galat hai.";
    } else {
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);
 
        if ($check->rowCount() > 0) {
            $error = "Yeh email pehle se registered hai.";
        } else {
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $stmt   = $pdo->prepare("INSERT INTO users (username, email, password, role, is_active, created_at) VALUES (?, ?, ?, ?, 1, NOW())");
            $stmt->execute([$username, $email, $hashed, $role]);
            $success = "User successfully add ho gaya!";
            $_POST = [];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background-color: #0f0f0f;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .container { width: 100%; max-width: 550px; }
        .page-title { font-size: 26px; font-weight: 400; margin-bottom: 30px; color: #fff; }
        .page-title span { color: #c9a84c; }
        .card { background: #1a1a1a; padding: 36px; border: 1px solid #2a2a2a; }
        .form-group { margin-bottom: 22px; }
        label { display: block; font-size: 12px; letter-spacing: 1.5px; color: #c9a84c; margin-bottom: 8px; text-transform: uppercase; }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%; padding: 12px 14px; background: #111;
            border: 1px solid #333; color: #fff; font-size: 14px; outline: none; transition: border 0.2s;
        }
        input:focus, select:focus { border-color: #c9a84c; }
        select option { background: #111; }
        .btn-submit {
            width: 100%; padding: 14px; background: #c9a84c; color: #111;
            border: none; font-size: 14px; font-weight: bold; letter-spacing: 1.5px;
            cursor: pointer; text-transform: uppercase; margin-top: 6px; transition: background 0.2s;
        }
        .btn-submit:hover { background: #b8932e; }
        .btn-back { display: inline-block; margin-top: 18px; color: #777; text-decoration: none; font-size: 13px; transition: color 0.2s; }
        .btn-back:hover { color: #c9a84c; }
        .alert { padding: 12px 16px; margin-bottom: 22px; font-size: 13px; border-left: 3px solid; }
        .alert-success { background: #0d2b0d; border-color: #4caf50; color: #4caf50; }
        .alert-error   { background: #2b0d0d; border-color: #e74c3c; color: #e74c3c; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-title">Add <span>New User</span></h1>
    <div class="card">
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
 
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" placeholder="Username darain" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" placeholder="email@example.com" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password darain" required>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="">-- Role chunein --</option>
                    <option value="admin"        <?= (($_POST['role'] ?? '') === 'admin')        ? 'selected' : '' ?>>Admin</option>
                    <option value="receptionist" <?= (($_POST['role'] ?? '') === 'receptionist') ? 'selected' : '' ?>>Receptionist</option>
                    <option value="user"         <?= (($_POST['role'] ?? '') === 'user')         ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">+ Add User</button>
        </form>
        <a href="manage_users.php" class="btn-back">&#8592; Back to Manage Users</a>
    </div>
</div>
</body>
</html>