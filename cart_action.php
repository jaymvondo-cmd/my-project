<?php
session_start();
include("config/db.php");

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? 0;

if ($action === 'add' && $id > 0) {
    // Fetch product details
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Add or increment quantity
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image_path'],
                'quantity' => 1
            ];
        }
    }
} elseif ($action === 'remove' && $id > 0) {
    // Remove specific item
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
} elseif ($action === 'clear') {
    // Empty the entire cart
    $_SESSION['cart'] = [];
}

// Redirect back to cart page
header("Location: pages/cart.php");
exit();
?>
