<?php
session_start();
include("../config/db.php");

$total = 0;

foreach($_SESSION['cart'] as $id){
    $res = $conn->query("SELECT * FROM products WHERE id=$id");
    $p = $res->fetch_assoc();
    $total += $p['price'];
}

echo "Total: $total";

$conn->query("INSERT INTO payments (user_id,amount,status)
VALUES (".$_SESSION['user']['id'].",$total,'paid')");

session_destroy();

echo "<br>Payment successful!";