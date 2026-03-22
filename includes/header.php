<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Pro</title>
    <!-- We will use a main modern stylesheet -->
    <link rel="stylesheet" href="/WebDev/e-commerce/css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>

<!-- Video Background (Single Video Reverted) -->
<div class="video-bg-container">
    <video autoplay muted loop playsinline id="bg-video">
        <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>
</div>

<style>
/* CSS for Native Video */
#bg-video {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    opacity: 1; /* Fully visible */
    pointer-events: none;
}
.video-overlay {
    z-index: 1; /* Keep overlay above the iframe */
    background: transparent; /* Remove any darkening cover over the iframe */
}
</style>

<nav class="navbar">
    <div class="logo">
        <a href="/WebDev/e-commerce/index.php" style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 10px;">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
               <line x1="3" y1="6" x2="21" y2="6"></line>
               <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            MyStore
        </a>
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Search premium products...">
    </div>

    <div class="nav-links">
        <a href="/WebDev/e-commerce/index.php">Home</a>
        <a href="/WebDev/e-commerce/pages/products.php">Products</a>
        <a href="/WebDev/e-commerce/about.php">About Us</a>
        <a href="/WebDev/e-commerce/pages/cart.php">Cart</a>
        
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="/WebDev/e-commerce/dashboard.php">Dashboard</a>
        <?php endif; ?>

        <?php if(isset($_SESSION['user'])): ?>
            <a href="/WebDev/e-commerce/profile.php">Profile</a>
            <a href="/WebDev/e-commerce/auth/logout.php" class="btn-logout">Logout</a>
        <?php else: ?>
            <a href="/WebDev/e-commerce/auth/login.php" class="btn-login">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="main-content">