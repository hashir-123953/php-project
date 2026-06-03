<?php
include('../includes/connection.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Pehle image ka naam lo (delete karne ke liye)
    $get = "SELECT image FROM quiz WHERE id=$id";
    $result = mysqli_query($conn, $get);
    $row = mysqli_fetch_assoc($result);

    $image = $row['image'];

    // Image delete from folder
    if (!empty($image) && file_exists("../images/" . $image)) {
        unlink("../images/" . $image);
    }

    // Record delete
    $delete = "DELETE FROM gk WHERE id=$id";
    mysqli_query($conn, $delete);

    header("Location: quiz.php");
    exit();
}
?>