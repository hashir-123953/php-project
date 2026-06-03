<?php
include('../includes/connection.php');

$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];




    // // IMAGE UPLOAD
    // $image = $_FILES['image']['name'];
    // $tmp_name = $_FILES['image']['tmp_name'];

    // // Unique name (important)
    // $imageName = time() . "_" . $image;

    // move_uploaded_file($tmp_name, "../images/" . $imageName);



    $update = "UPDATE books 
               SET title='$title', author='$author', price='$price' 
               WHERE id=$id";

    mysqli_query($conn, $update);
    header("Location: books.php");
}
?>

<form method="POST">
    <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <input type="text" name="author" value="<?php echo $row['author']; ?>">
    <input type="number" name="price" value="<?php echo $row['price']; ?>">
     <label>Image:</label><br>
    <!-- <input type="file" name="image" required><br><br> -->
    <button type="submit" name="update">Update</button>
</form>