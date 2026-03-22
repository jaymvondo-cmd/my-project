<?php 
require_once(__DIR__ . "/../config/app.php");
require_once(__DIR__ . "/../config/db.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault - Premium Gaming Gear</title>
    <!-- We will use a main modern stylesheet -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
</head>
<body>

<!-- Video Background System (Rotating 6 Videos) -->
<div class="video-bg-container">
    <video autoplay muted loop playsinline id="bg-video">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-gaming-setup-with-neon-lights-42521-large.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="video-overlay"></div>
</div>

<script>
    const gamingVideos = [
        "https://assets.mixkit.co/videos/preview/mixkit-gaming-setup-with-neon-lights-42521-large.mp4",
        "https://assets.mixkit.co/videos/preview/mixkit-young-man-playing-video-games-with-a-headset-42525-large.mp4",
        "https://assets.mixkit.co/videos/preview/mixkit-excited-gamer-winning-a-match-42526-large.mp4",
        "https://assets.mixkit.co/videos/preview/mixkit-keyboard-and-mouse-of-a-gamer-42528-large.mp4",
        "https://assets.mixkit.co/videos/preview/mixkit-gaming-room-with-blue-and-pink-neon-lights-42530-large.mp4",
        "https://assets.mixkit.co/videos/preview/mixkit-close-up-of-a-gamers-keyboard-42531-large.mp4"
    ];

    // Select a random video on page load
    const videoElement = document.getElementById('bg-video');
    const randomIndex = Math.floor(Math.random() * gamingVideos.length);
    videoElement.querySelector('source').src = gamingVideos[randomIndex];
    videoElement.load();
</script>

<style>
/* CSS for Video Scaling */
#bg-video {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
    pointer-events: none;
}
.video-overlay {
    z-index: 1;
    background: rgba(0, 0, 0, 0.4); /* Stronger overlay for better visibility */
}
</style>

<nav class="navbar">
    <div class="logo">
        <a href="<?php echo BASE_URL; ?>index.php" style="color: inherit; text-decoration: none; display: flex; align-items: center; gap: 10px;">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#F4A261" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 12L10 12"></path>
                <path d="M8 10L8 14"></path>
                <path d="M15 13H15.01"></path>
                <path d="M18 11H18.01"></path>
                <rect x="2" y="6" width="20" height="12" rx="2"></rect>
            </svg>
            GameVault
        </a>
    </div>

    <div class="search-bar">
        <input type="text" placeholder="Search premium gaming gear...">
    </div>

    <div class="nav-links">
        <a href="<?php echo BASE_URL; ?>index.php">Home</a>
        <a href="<?php echo BASE_URL; ?>pages/products.php">Products</a>
        <a href="<?php echo BASE_URL; ?>about.php">About Us</a>
        <a href="<?php echo BASE_URL; ?>pages/cart.php">Cart</a>
        
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="<?php echo BASE_URL; ?>dashboard.php">Dashboard</a>
        <?php endif; ?>

        <?php if(isset($_SESSION['user'])): ?>
            <a href="<?php echo BASE_URL; ?>profile.php">Profile</a>
            <a href="<?php echo BASE_URL; ?>auth/logout.php" class="btn-logout">Logout</a>
        <?php else: ?>
            <a href="<?php echo BASE_URL; ?>auth/login.php" class="btn-login">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="main-content">