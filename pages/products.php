<?php
include("../config/db.php");
include("../includes/header.php");

$query = "SELECT products.*, categories.name as cat_name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY id DESC";
$result = $conn->query($query);
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; margin-bottom: 30px; padding: 0 20px;">
    <div>
        <h2 class="page-title" style="margin-bottom: 5px; text-align: left;">All Products</h2>
        <p style="color: var(--text-muted);">Browse our entire collection</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <select style="background: rgba(255,255,255,0.05); color: white; border: 1px solid var(--glass-border); padding: 10px 15px; border-radius: 8px; font-family: inherit;">
            <option value="">All Categories</option>
            <option value="1">Electronics</option>
            <option value="2">Clothing</option>
            <option value="3">Home & Garden</option>
            <option value="4">Sports</option>
        </select>
        <select style="background: rgba(255,255,255,0.05); color: white; border: 1px solid var(--glass-border); padding: 10px 15px; border-radius: 8px; font-family: inherit;">
            <option value="">Sort By</option>
            <option value="price_asc">Price: Low to High</option>
            <option value="price_desc">Price: High to Low</option>
            <option value="newest">Newest Arrivals</option>
        </select>
    </div>
</div>

<div class="products-grid">
    <?php
    if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            // Check if image path is an external URL
            if (filter_var($row['image_path'], FILTER_VALIDATE_URL)) {
                $imgPath = $row['image_path'];
            } else {
                $imgPath = $row['image_path'] ? "../uploads/" . $row['image_path'] : "https://via.placeholder.com/400x300?text=No+Image";
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
            <a href="../cart_action.php?action=add&id=<?php echo $row['id']; ?>" class="btn-primary" style="display: block; text-align: center; text-decoration: none; box-sizing: border-box; margin-bottom: 10px;">Buy Now</a>
            <a href="../cart_action.php?action=add&id=<?php echo $row['id']; ?>" style="display: block; text-align: center; text-decoration: none; width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                Add to Cart
            </a>
        </div>
    </div>
    <?php
        }
    } else {
        echo "<div style='grid-column: 1/-1; text-align: center; padding: 50px; background: rgba(255,255,255,0.05); border-radius: 12px; border: 1px solid var(--glass-border);'>";
        echo "<h3 style='color: white; margin-bottom: 10px;'>No products found</h3>";
        echo "<p style='color: var(--text-muted);'>We are currently restocking our inventory. Please check back later.</p>";
        echo "</div>";
    }
    ?>
</div>

<?php include("../includes/footer.php"); ?>
