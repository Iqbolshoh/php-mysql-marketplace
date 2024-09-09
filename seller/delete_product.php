<?php
include 'check.php';

if (isset($_GET['product_id']) && isset($_SESSION['id'])) {
    $productId = $query->validate($_GET['product_id']);
    $userId = $query->validate($_SESSION['id']);

    $productImages = $query->select('product_images', "image_url", "WHERE product_id = $productId");
    foreach ($productImages as $image) {
        $imageFilePath = '../images/products/' . $image['image_url'];
        if (file_exists($imageFilePath)) {
            unlink($imageFilePath);
        }
    }
    $query->delete('cart', "WHERE product_id = $productId");
    $query->delete('wishes', "WHERE product_id = $productId");
    $query->delete('product_images', "WHERE product_id = $productId");
    $query->delete('products', "WHERE id = $productId");

    header("Location: ./");
    exit();
}
