<?php
require_once(__DIR__ . "/config/app.php");
require_once(__DIR__ . "/includes/header.php");

$result = $conn->query("SELECT products.*, categories.name as cat_name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY id DESC");
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2 class="page-title" style="margin-bottom: 0;">Pro Gaming Gear</h2>
    <a href="<?php echo BASE_URL; ?>add_product.php" class="btn-primary" style="width: auto; text-decoration: none; padding: 10px 20px;">+ Add Gear</a>
</div>

<div class="products-grid">
    <?php
    if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if (filter_var($row['image_path'], FILTER_VALIDATE_URL)) {
                $imgPath = $row['image_path'];
            } else {
                $imgPath = $row['image_path'] ? BASE_URL . "uploads/" . $row['image_path'] : "https://via.placeholder.com/400x300?text=No+Image";
            }
    ?>
    <div class="card">
        <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
        <div class="card-content">
            <span style="font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase;">
                <?php echo htmlspecialchars($row['cat_name'] ?? 'Gaming Gear'); ?>
            </span>
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <div class="price">$<?php echo number_format($row['price'], 2); ?></div>
            <a href="<?php echo BASE_URL; ?>cart_action.php?action=add&id=<?php echo $row['id']; ?>" class="btn-primary" style="display: block; text-align: center; text-decoration: none; box-sizing: border-box;">Add to Cart</a>
        </div>
    </div>
    <?php
        }
    } else {
        echo "<p style=\"grid-column: 1/-1; text-align: center; color: var(--text-muted);\">No gear found. Start by adding a product.</p>";
    }
    ?>
</div>

<?php require_once(__DIR__ . "/includes/footer.php"); ?>