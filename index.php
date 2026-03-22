<?php 
include("includes/header.php"); 
include("config/db.php");
?>

<div class="hero" style="text-align: center; padding: 60px 20px; background: rgba(0,0,0,0.4); border-radius: 20px; margin-bottom: 40px; backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <h1 style="font-size: 54px; font-weight: 800; margin-bottom: 15px; color: var(--primary);">Discover Premium Products</h1>
    <p style="font-size: 20px; color: var(--text-muted); max-width: 600px; margin: 0 auto 30px;">The best deals structured with glassmorphism and modern aesthetics. Elevate your e-commerce experience.</p>
    <div style="display: flex; justify-content: center; gap: 20px;">
        <a href="view_product.php" class="btn-primary" style="text-decoration: none; display: inline-block; width: auto; padding: 12px 30px;">Shop Now</a>
        <a href="add_product.php" style="text-decoration: none; display: inline-block; padding: 12px 30px; border: 2px solid var(--primary); color: white; border-radius: 8px; font-weight: 700; transition: all 0.3s;">Add Product</a>
    </div>
</div>

<h2 class="page-title">Featured Collections</h2>

<div class="products-grid">
    <?php
    $query = "SELECT products.*, categories.name as cat_name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY id DESC LIMIT 4";
    $result = $conn->query($query);
    if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if (filter_var($row['image_path'], FILTER_VALIDATE_URL)) {
                $imgPath = $row['image_path'];
            } else {
                $imgPath = $row['image_path'] ? "uploads/" . $row['image_path'] : "https://via.placeholder.com/400x300?text=No+Image";
            }
    ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        <div class="card-content">
            <span style="font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase;">
                <?php echo htmlspecialchars($row['cat_name'] ?? 'Uncategorized'); ?>
            </span>
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="price">$<?php echo number_format($row['price'], 2); ?></div>
            <a href="cart_action.php?action=add&id=<?php echo $row['id']; ?>" class="btn-primary" style="display: block; text-align: center; text-decoration: none; box-sizing: border-box;">Add to Cart</a>
        </div>
    </div>
    <?php
        }
    } else {
        echo "<p style=\"grid-column: 1/-1; text-align: center; color: var(--text-muted);\">No products available yet.</p>";
    }
    ?>
</div>

<?php include("includes/footer.php"); ?>