<?php
include 'check.php';

if (isset($_POST['item_id']) && isset($_POST['quantity'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    $query->executeQuery("UPDATE cart SET number_of_products = $quantity WHERE product_id = $itemId AND user_id = {$_SESSION['id']}");
}
?>