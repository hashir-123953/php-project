<?php
session_start();
session_destroy();

// redirect to homepage (index)
header("Location: index.php"); 
exit();
?>