<?php
include("config/db.php");
$message = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];

    // Image upload
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Create uploads directory if it doesn't exist
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $sql = "INSERT INTO products (name, description, price, stock, category_id, image_path)
                VALUES ('$name', '$desc', '$price', '$stock', '$category', '$image')";
        if($conn->query($sql)){
            $message = "<div style='color: #4cd137; text-align: center; margin-bottom: 20px; font-weight: bold;'>Product added successfully!</div>";
        } else {
            $message = "<div style='color: #e84118; text-align: center; margin-bottom: 20px; font-weight: bold;'>Error: " . $conn->error . "</div>";
        }
    } else {
        $message = "<div style='color: #e84118; text-align: center; margin-bottom: 20px; font-weight: bold;'>Failed to upload image.</div>";
    }
}
include("includes/header.php");
?>

<div class="glass-form" style="margin-top: 50px;">
    <h2>Add New Product</h2>
    <?php echo $message; ?>
    <form method="POST" enctype="multipart/form-data">
        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Product Name</label>
        <input type="text" name="name" placeholder="Enter product name" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Description</label>
        <textarea name="description" placeholder="A rich description of the product..." rows="4" required></textarea>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Price ($)</label>
        <input type="number" name="price" step="0.01" placeholder="0.00" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Stock</label>
        <input type="number" name="stock" placeholder="100" required>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Category</label>
        <select name="category" required>
            <option value="" disabled selected>Select a category</option>
            <?php
            $res = $conn->query("SELECT * FROM categories");
            if($res) {
                while($row = $res->fetch_assoc()){
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
            }
            ?>
        </select>

        <label style="color: var(--text-muted); font-size: 14px; margin-bottom: 5px; display: block;">Product Image</label>
        <input type="file" name="image" accept="image/*" style="padding: 10px; background: rgba(0,0,0,0.2);" required>

        <button name="submit" class="btn-primary" style="margin-top: 20px;">Add Product</button>
    </form>
</div>

<?php include("includes/footer.php"); ?>