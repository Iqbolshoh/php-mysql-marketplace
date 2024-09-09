<?php include 'check.php';

if (isset($_GET['product_id']) && isset($_SESSION['id'])) {
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    $userId = $_SESSION['id'];

    $cartData = array(
        'user_id' => $userId,
        'product_id' => $productId,
        'number_of_products' => $quantity
    );

    if (!isset($query->select('cart', "id", "WHERE product_id = $productId AND user_id = $userId ")[0]['id'])) {
        $query->insert('cart', $cartData);
    }
}
