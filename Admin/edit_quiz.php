<?php
include('../includes/connection.php');

$id = $_GET['id'];

// FETCH NOVEL DATA
$query = "SELECT * FROM quiz WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// UPDATE NOVEL
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $update = "UPDATE quiz
               SET title='$title', 
                   author='$author', 
                   price='$price'
               WHERE id=$id";

    mysqli_query($conn, $update);

    header("Location: quiz.php");
    exit();
}
?>

<form method="POST">
    <input type="text" name="title" value="<?php echo $row['title']; ?>" placeholder="Novel Title">
    <input type="text" name="author" value="<?php echo $row['author']; ?>" placeholder="Author Name">
    <input type="number" name="price" value="<?php echo $row['price']; ?>" placeholder="Price">

    <button type="submit" name="update">Update Quiz-Books</button>
</form>