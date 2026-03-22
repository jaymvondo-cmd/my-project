<?php
session_start();
include("../config/db.php");

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // For demonstration, dummy authentication
    // In a real app, you would check against the database
    if ($email === 'admin@mystore.com' && $password === 'password') {
        $_SESSION['user'] = [
            'id' => 1,
            'name' => 'Admin User',
            'email' => $email,
            'role' => 'admin'
        ];
        header("Location: ../dashboard.php");
        exit();
    } else if ($email === 'user@mystore.com' && $password === 'password') {
        $_SESSION['user'] = [
            'id' => 2,
            'name' => 'Regular User',
            'email' => $email,
            'role' => 'user'
        ];
        header("Location: ../index.php");
        exit();
    } else {
        $error = "Invalid email or password. Use admin@mystore.com / password.";
    }
}
include("../includes/header.php");
?>

<div class="glass-form" style="margin-top: 80px;">
    <h2>Welcome Back to MyStore</h2>
    
    <?php if($error): ?>
        <div style="background: rgba(232, 65, 24, 0.2); border: 1px solid #e84118; color: #ff7675; padding: 10px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit" name="login" class="btn-primary" style="margin-top: 10px;">Login</button>
        
        <p style="text-align: center; margin-top: 20px; color: var(--text-muted); font-size: 14px;">
            Don't have an account? <a href="register.php" style="color: var(--primary); text-decoration: none;">Sign up here</a>.
        </p>
    </form>
</div>

<?php include("../includes/footer.php"); ?>