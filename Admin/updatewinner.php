<?php
include "includes/connection.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM winners WHERE id=$id"));
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>
    <input type="text" name="title" value="<?php echo $data['title']; ?>"><br>
    <input type="text" name="description" value="<?php echo $data['description']; ?>"><br>
    <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    mysqli_query($conn, "UPDATE winners 
    SET name='$name', title='$title', description='$desc' 
    WHERE id=$id");
}
?>
