<?php include 'check.php';

$seller_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price_old = $_POST['price_old'];
    $price_current = $_POST['price_current'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    $data = array(
        'name' => $query->validate($name),
        'category_id' => $query->validate($category_id),
        'seller_id' => $query->validate($seller_id),
        'price_old' => $query->validate($price_old),
        'price_current' => $query->validate($price_current),
        'description' => $query->validate($description),
        'rating' => 5,
        'quantity' => $query->validate($quantity)
    );

    $product_id = $query->lastInsertId('products', $data);

    if ($product_id) {
        $uploaded_images = $query->saveImagesToDatabase($_FILES['image'], "../src/images/products/", $product_id);
        header("Location: ./");
    }
}
