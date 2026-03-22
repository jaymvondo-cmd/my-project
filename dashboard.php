<?php
session_start();
if($_SESSION['user']['role'] != 'admin'){
    die("Access denied");
}
?>

<h2>Admin Dashboard</h2>

<a href="add_product.php">Add Product</a><br>
<a href="../auth/logout.php">Logout</a>