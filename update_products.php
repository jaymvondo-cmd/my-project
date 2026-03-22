<?php
require_once(__DIR__ . "/config/db.php");

$updates = [
    1 => [
        'name' => 'Xtreme Gaming Tower',
        'image_path' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=800&auto=format&fit=crop',
        'description' => 'Elite gaming tower with RTX 4090, 64GB DDR5 RAM, and liquid cooling for the ultimate 4K gaming experience.'
    ],
    9 => [
        'name' => 'Apex Pro Gaming Chair',
        'image_path' => 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?w=800&auto=format&fit=crop',
        'description' => 'Professional ergonomic racing chair with high-density foam, 4D armrests, and full lumbar support.'
    ],
    // Add more if needed. Let's fix some others to ensure they are "gaming" themed.
    14 => [
        'name' => 'Hurricane ARGB Fan Kit',
        'image_path' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=800&auto=format&fit=crop',
        'description' => 'Three 120mm PWM fans with adressable RGB rings and ultra-quiet hydraulic bearings.'
    ]
];

foreach ($updates as $id => $data) {
    $stmt = $conn->prepare("UPDATE products SET name = ?, image_path = ?, description = ? WHERE id = ?");
    $stmt->bind_param("sssi", $data['name'], $data['image_path'], $data['description'], $id);
    if ($stmt->execute()) {
        echo "Updated product ID $id: {$data['name']}\n";
    } else {
        echo "Error updating product ID $id: " . $conn->error . "\n";
    }
}

// Ensure all categories are correct
$conn->query("UPDATE categories SET name = 'Computers' WHERE id = 1");
$conn->query("UPDATE categories SET name = 'Peripherals' WHERE id = 2");
$conn->query("UPDATE categories SET name = 'Accessories' WHERE id = 3");
$conn->query("UPDATE categories SET name = 'Consoles' WHERE id = 4");

echo "Database updates complete.\n";
?>
