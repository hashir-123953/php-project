
<?php
include "../includes/connection.php";
 
$success = "";
$error   = "";
 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage_users.php");
    exit;
}
 
$id = (int) $_GET['id'];
 
function getUser($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
 
$user = getUser($pdo, $id);
 
if (!$user) {
    die("User nahi mila.");
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username  = trim($_POST['username'] ?? '');
    $email     = trim($_POST['email']    ?? '');
    $role      = $_POST['role']          ?? '';
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    $new_pass  = trim($_POST['password'] ?? '');
 
    if (empty($username) || empty($email) || empty($role)) {
        $error = "Username, email aur role zaroori hain.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email format galat hai.";
    } else {
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $check->execute([$email, $id]);
 
        if ($check->rowCount() > 0) {
            $error = "Yeh email kisi aur user ke paas hai.";
        } else {
            if (!empty($new_pass)) {
                $hashed = password_hash($new_pass, PASSWORD_BCRYPT);
                $upd = $pdo->prepare("UPDATE users SET username=?, email=?, password=?, role=?, is_active=? WHERE id=?");
                $upd->execute([$username, $email, $hashed, $role, $is_active, $id]);
            } else {
                $upd = $pdo->prepare("UPDATE users SET username=?, email=?, role=?, is_active=? WHERE id=?");
                $upd->execute([$username, $email, $role, $is_active, $id]);
            }
            $success = "User successfully update ho gaya!";
            $user = getUser($pdo, $id);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
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
        .page-title { font-size: 26px; font-weight: 400; margin-bottom: 6px; color: #fff; }
        .page-title span { color: #c9a84c; }
        .user-id { font-size: 13px; color: #555; margin-bottom: 28px; letter-spacing: 1px; }
        .card { background: #1a1a1a; padding: 36px; border: 1px solid #2a2a2a; }
        .form-group { margin-bottom: 22px; }
        label { display: block; font-size: 12px; letter-spacing: 1.5px; color: #c9a84c; margin-bottom: 8px; text-transform: uppercase; }
        input[type="text"], input[type="email"], input[type="password"], select {
            width: 100%; padding: 12px 14px; background: #111;
            border: 1px solid #333; color: #fff; font-size: 14px; outline: none; transition: border 0.2s;
        }
        input:focus, select:focus { border-color: #c9a84c; }
        select option { background: #111; }
        .hint { font-size: 11px; color: #555; margin-top: 5px; }
        .toggle-row { display: flex; align-items: center; gap: 14px; }
        .toggle-label { font-size: 13px; color: #aaa; }
        .switch { position: relative; display: inline-block; width: 44px; height: 24px; }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background: #333; transition: 0.3s; border-radius: 24px; }
        .slider:before { position: absolute; content: ""; height: 16px; width: 16px; left: 4px; bottom: 4px; background: #777; transition: 0.3s; border-radius: 50%; }
        input:checked + .slider { background: #1a3a1a; }
        input:checked + .slider:before { transform: translateX(20px); background: #4caf50; }
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
    <h1 class="page-title">Edit <span>User</span></h1>
    <p class="user-id">ID #<?= htmlspecialchars($user['id']) ?></p>
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
                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" placeholder="Khali chhorein agar change na karna ho">
                <p class="hint">* Agar password nahi badalna toh khali chhorein</p>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="admin"        <?= $user['role'] === 'admin'        ? 'selected' : '' ?>>Admin</option>
                    <option value="receptionist" <?= $user['role'] === 'receptionist' ? 'selected' : '' ?>>Receptionist</option>
                    <option value="user"         <?= $user['role'] === 'user'         ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="toggle-row">
                    <label class="switch">
                        <input type="checkbox" name="is_active" <?= $user['is_active'] ? 'checked' : '' ?>>
                        <span class="slider"></span>
                    </label>
                    <span class="toggle-label">Active / Inactive</span>
                </div>
            </div>
            <button type="submit" class="btn-submit">&#10003; Update User</button>
        </form>
        <a href="manage_users.php" class="btn-back">&#8592; Back to Manage Users</a>
    </div>
</div>
</body>
</html>