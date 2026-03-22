<?php
include("../config/db.php");
include("../includes/header.php");

$res = $conn->query("SELECT * FROM products");
?>

<div class="container">
    <h2>Products</h2>

    <div class="products">

    <?php while($p = $res->fetch_assoc()){ ?>

        <div class="card">
            <img src="../uploads/<?php echo $p['image_path']; ?>">

            <h3><?php echo $p['name']; ?></h3>

            <p class="price">$<?php echo $p['price']; ?></p>

            <a href="cart.php?id=<?php echo $p['id']; ?>">
                <button class="btn">Add to Cart</button>
            </a>
        </div>

    <?php } ?>

    </div>
</div>

<?php include("../includes/footer.php"); ?>