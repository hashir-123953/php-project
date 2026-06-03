

<?php
include "../includes/connection.php";
 
$error = "";
 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: manage_users.php");
    exit;
}
 
$id = (int) $_GET['id'];
 
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
if (!$user) {
    die("User nahi mila.");
}
 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    if ($user['role'] === 'admin') {
        $error = "Admin user ko delete nahi kiya ja sakta.";
    } else {
        $del = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $del->execute([$id]);
        header("Location: manage_users.php?deleted=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
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
        .container { width: 100%; max-width: 480px; text-align: center; }
        .icon { font-size: 52px; margin-bottom: 20px; color: #e74c3c; }
        .page-title { font-size: 26px; font-weight: 400; margin-bottom: 10px; }
        .page-title span { color: #e74c3c; }
        .subtitle { font-size: 14px; color: #666; margin-bottom: 30px; line-height: 1.6; }
        .card { background: #1a1a1a; border: 1px solid #2a2a2a; padding: 30px; margin-bottom: 20px; }
        .info-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #222; text-align: left; }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-size: 11px; letter-spacing: 1.5px; color: #555; text-transform: uppercase; }
        .info-value { font-size: 14px; color: #ddd; font-weight: 500; }
        .role-badge { display: inline-block; padding: 3px 10px; border: 1px solid #555; font-size: 11px; letter-spacing: 1px; color: #aaa; }
        .role-badge.admin        { border-color: #c9a84c; color: #c9a84c; }
        .role-badge.receptionist { border-color: #aaa;    color: #aaa; }
        .role-badge.user         { border-color: #666;    color: #888; }
        .btn-row { display: flex; gap: 12px; }
        .btn-cancel {
            flex: 1; padding: 13px; background: transparent; border: 1px solid #333;
            color: #aaa; font-size: 13px; cursor: pointer; text-decoration: none;
            display: flex; align-items: center; justify-content: center; transition: all 0.2s;
        }
        .btn-cancel:hover { border-color: #555; color: #fff; }
        .btn-delete {
            flex: 1; padding: 13px; background: #c0392b; border: none;
            color: #fff; font-size: 13px; font-weight: bold; cursor: pointer;
            text-transform: uppercase; transition: background 0.2s;
        }
        .btn-delete:hover { background: #a93226; }
        .alert-error { background: #2b0d0d; border-left: 3px solid #e74c3c; color: #e74c3c; padding: 12px 16px; margin-bottom: 20px; font-size: 13px; text-align: left; }
        .warning-text { font-size: 12px; color: #555; margin-top: 14px; line-height: 1.5; }
    </style>
</head>
<body>
<div class="container">
    <div class="icon">&#9888;</div>
    <h1 class="page-title">Delete <span>User</span></h1>
    <p class="subtitle">
        Kya aap sach mein yeh user delete karna chahte hain?<br>
        Yeh amal wapas nahi ho sakta.
    </p>
 
    <?php if (!empty($error)): ?>
        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
 
    <div class="card">
        <div class="info-row">
            <span class="info-label">ID</span>
            <span class="info-value">#<?= $user['id'] ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Username</span>
            <span class="info-value"><?= htmlspecialchars($user['username']) ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Email</span>
            <span class="info-value"><?= htmlspecialchars($user['email']) ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Role</span>
            <span class="role-badge <?= $user['role'] ?>"><?= strtoupper($user['role']) ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">Status</span>
            <span class="info-value" style="color: <?= $user['is_active'] ? '#4caf50' : '#e74c3c' ?>">
                <?= $user['is_active'] ? 'Active' : 'Inactive' ?>
            </span>
        </div>
    </div>
 
    <form method="POST">
        <div class="btn-row">
            <a href="manage_users.php" class="btn-cancel">&#8592; Cancel</a>
            <button type="submit" name="confirm_delete" class="btn-delete">&#128465; Haan, Delete Karo</button>
        </div>
        <p class="warning-text">* Admin role ke users ko delete nahi kiya ja sakta system security ke liye.</p>
    </form>
</div>
</body>
</html>