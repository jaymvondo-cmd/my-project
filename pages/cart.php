<?php
include("../config/db.php");
include("../includes/header.php");

$cart_items = $_SESSION['cart'] ?? [];
$total_cost = 0;
?>

<div class="glass-form" style="max-width: 800px; margin-top: 40px; padding: 40px;">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid var(--glass-border); padding-bottom: 20px; margin-bottom: 30px;">
        <h2 style="margin: 0;">Your Shopping Cart</h2>
        <span style="color: var(--text-muted); font-size: 16px;"><?php echo count($cart_items); ?> Item(s)</span>
    </div>

    <?php if (empty($cart_items)): ?>
        <div style="text-align: center; padding: 40px 0;">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 20px; opacity: 0.5;">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <h3 style="color: white; margin-bottom: 15px;">Your cart is empty</h3>
            <p style="color: var(--text-muted); margin-bottom: 25px;">Looks like you haven't added any products to your cart yet.</p>
            <a href="products.php" class="btn-primary" style="text-decoration: none; padding: 12px 30px; display: inline-block; width: auto;">Start Shopping</a>
        </div>
    <?php else: ?>
        <div style="display: flex; flex-direction: column; gap: 20px;">
            <?php foreach ($cart_items as $id => $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total_cost += $subtotal;
                
                if (filter_var($item['image'], FILTER_VALIDATE_URL)) {
                    $imgPath = $item['image'];
                } else {
                    $imgPath = $item['image'] ? "../uploads/" . $item['image'] : "https://via.placeholder.com/150?text=No+Image";
                }
            ?>
            <div style="display: flex; align-items: center; gap: 20px; background: rgba(0,0,0,0.2); padding: 15px; border-radius: 12px; border: 1px solid var(--glass-border);">
                <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                
                <div style="flex: 1;">
                    <h4 style="color: white; font-size: 18px; margin-bottom: 5px;"><?php echo htmlspecialchars($item['name']); ?></h4>
                    <div style="color: var(--text-muted); font-size: 14px;">$<?php echo number_format($item['price'], 2); ?> × <?php echo $item['quantity']; ?></div>
                </div>
                
                <div style="text-align: right;">
                    <div style="color: var(--primary); font-weight: bold; font-size: 18px; margin-bottom: 10px;">$<?php echo number_format($subtotal, 2); ?></div>
                    <a href="../cart_action.php?action=remove&id=<?php echo $id; ?>" style="color: #e74c3c; text-decoration: none; font-size: 14px; transition: 0.3s;" onmouseover="this.style.color='#c0392b';" onmouseout="this.style.color='#e74c3c';">Remove</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="margin-top: 40px; border-top: 1px solid var(--glass-border); padding-top: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <span style="color: white; font-size: 20px;">Total Amount</span>
                <span style="color: var(--primary); font-size: 32px; font-weight: 800;">$<?php echo number_format($total_cost, 2); ?></span>
            </div>
            
            <div style="display: flex; gap: 15px;">
                <a href="../cart_action.php?action=clear" style="flex: 1; text-align: center; text-decoration: none; padding: 15px; border-radius: 8px; border: 1px solid rgba(231, 76, 60, 0.5); color: #e74c3c; transition: 0.3s;" onmouseover="this.style.background='rgba(231, 76, 60, 0.1)';" onmouseout="this.style.background='transparent';">Clear Cart</a>
                <a href="checkout.php" class="btn-primary" style="flex: 2; text-align: center; text-decoration: none; padding: 15px;">Proceed to Checkout</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include("../includes/footer.php"); ?>
>