
<?php
include "../includes/connection.php";

// ADD ROLE
if(isset($_POST['add'])){
    $role_name = $_POST['role_name'];
    mysqli_query($conn, "INSERT INTO roles(role_name) VALUES('$role_name')");
}

// DELETE ROLE
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM roles WHERE id=$id");
}

// GET ROLE FOR EDIT
$editData = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM roles WHERE id=$id");
    $editData = mysqli_fetch_assoc($res);
}

// UPDATE ROLE
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $role_name = $_POST['role_name'];

    mysqli_query($conn, "UPDATE roles SET role_name='$role_name' WHERE id=$id");
}

// FETCH ROLES
$result = mysqli_query($conn, "SELECT * FROM roles");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Roles</title>

<style>
/* SAME STYLE COPY */
body {
    background: #121211;
    color: white;
    font-family: 'Montserrat', sans-serif;
    padding: 40px;
}

.container { max-width: 1000px; margin: auto; }

h2 { font-family: serif; }

.btn-add {
    background: #c5a059;
    color: black;
    padding: 10px 20px;
    text-decoration: none;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

th, td {
    padding: 15px;
    border-bottom: 1px solid #333;
}

th { color: #c5a059; }

a { color: #c5a059; text-decoration: none; }
.delete { color: red; }
</style>
</head>

<body>

<div class="container">
    <h2>Manage Roles</h2>

    <!-- ADD / EDIT FORM -->
    <form method="POST">
        <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

        Role Name:
        <input type="text" name="role_name" value="<?= $editData['role_name'] ?? '' ?>" required>

        <?php if($editData): ?>
            <button name="update">Update</button>
        <?php else: ?>
            <button name="add">Add Role</button>
        <?php endif; ?>
    </form>

    <!-- TABLE -->
    <table>
        <tr>
            <th>ID</th>
            <th>Role Name</th>
            <th>Actions</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['role_name'] ?></td>
            <td>
                <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                <a href="?delete=<?= $row['id'] ?>" class="delete" onclick="return confirm('Delete role?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>
```
