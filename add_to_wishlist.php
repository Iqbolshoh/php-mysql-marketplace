<?php include 'check.php';

if (isset($_GET['product_id']) && isset($_SESSION['id'])) {
    $productId = $_GET['product_id'];
    $userId = $_SESSION['id'];

    $cartData = array(
        'user_id' => $userId,
        'product_id' => $productId,
    );

    if (!isset($query->select('wishes', "id", "WHERE product_id = $productId AND user_id = $userId ")[0]['id'])) {
        $query->insert('wishes', $cartData);
    }
}
