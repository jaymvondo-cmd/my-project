<?php
session_start();
include("../config/db.php");

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    // Always successfully register as a dummy user to display success message
    $success = "Registration successful! You can now log in below.";
}

include("../includes/header.php");
?>

<div class="glass-form" style="margin-top: 50px;">
    <h2>Join the Family</h2>
    
    <?php if($error): ?>
        <div style="background: rgba(232, 65, 24, 0.2); border: 1px solid #e84118; color: #ff7675; padding: 10px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    
    <?php if($success): ?>
        <div style="background: rgba(76, 209, 55, 0.2); border: 1px solid #4cd137; color: #4cd137; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: bold;">
            <?php echo $success; ?>
            <br><a href="login.php" style="color: white; text-decoration: underline; margin-top: 10px; display: inline-block;">Go to Login</a>
        </div>
    <?php else: ?>

    <form method="POST" action="register.php">
        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Full Name</label>
        <input type="text" name="name" placeholder="Enter your full name" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Email Address</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Create Password</label>
        <input type="password" name="password" placeholder="Create a strong password" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Repeat your password" required>

        <button type="submit" name="register" class="btn-primary" style="margin-top: 10px;">Create Account</button>
        
        <p style="text-align: center; margin-top: 20px; color: var(--text-muted); font-size: 14px;">
            Already part of our family? <a href="login.php" style="color: var(--primary); text-decoration: none;">Login here</a>.
        </p>
    </form>
    
    <?php endif; ?>
</div>

<?php include("../includes/footer.php"); ?>