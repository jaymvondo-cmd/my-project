<?php
$conn = new mysqli('localhost', 'root', '', 'ecommerce_db');
if($conn->connect_error) die($conn->connect_error);
$res = $conn->query('SELECT products.*, categories.name as cat_name FROM products LEFT JOIN categories ON products.category_id = categories.id');
while($row = $res->fetch_assoc()) {
    echo 'ID: ' . $row['id'] . ' | Name: ' . $row['name'] . ' | Desc: ' . $row['description'] . ' | Image: ' . $row['image_path'] . ' | Cat: ' . $row['cat_name'] . PHP_EOL;
}
?>
