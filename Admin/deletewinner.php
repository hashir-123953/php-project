<?php
include('../includes/connection.php');

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    // 🔥 Step 1: image name fetch
    $get = "SELECT image FROM winners WHERE id=$id";
    $result = mysqli_query($conn, $get);
    $row = mysqli_fetch_assoc($result);

    if ($row) {

        $image = $row['image'];

        // 🔥 Step 2: delete image
        if (!empty($image) && file_exists("../img/" . $image)) {
            unlink("../img/" . $image);
        }

        // 🔥 Step 3: delete record
        $delete = "DELETE FROM winners WHERE id=$id";
        mysqli_query($conn, $delete);
    }

    header("Location: read_winner.php");
    exit();
}
?>