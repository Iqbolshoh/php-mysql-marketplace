<?php
include 'check.php';

$cartItems = $query->getCartItems($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./favicon.ico">
    <title>Shopping Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./src/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./src/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    .product-image {
        margin-right: 15px;
    }

    .shoping__cart__price del {
        color: red;
        font-size: 14px;
        margin-right: 5px;
    }

    .shoping__cart__price {
        font-size: 16px;
        font-weight: bold;
    }

    .shoping__cart__item__clo span {
        font-size: 24px;
        color: #b2b2b2;
        cursor: pointer;
    }

    .shoping__cart__item__clo span:hover {
        color: #ff6347;
        cursor: pointer;
    }

    .quantity input {
        width: 50px;
        text-align: center;
    }

    .cart-input {
        width: 50px;
        padding: 5px;
        text-align: center;
        border-radius: 10px;
        border: 0.5px solid #3085d6;
    }
</style>

<body>

    <?php include './includes/header.php'; ?>

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($cartItems)) { ?>
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItems as $item) { ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="./src/images/products/<?php echo $query->getProductImages($item['id'])[0] ?>"
                                                    style="width: 55px;" alt="">
                                                <h5><?php echo $item['name']; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <del>$<?php echo number_format($item['price_old'], 2); ?></del>
                                                $<?php echo number_format($item['price_current'], 2); ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <input type="number" value="<?php echo $item['number_of_products']; ?>"
                                                        id="quantity_<?php echo $item['id']; ?>" class="cart-input"
                                                        data-product-id="<?php echo $item['id']; ?>"
                                                        onchange="updateQuantity(<?php echo $item['id']; ?>)">
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                $<?php echo number_format($item['total_price'], 2); ?>
                                            </td>
                                            <td class="shoping__cart__item__clo">
                                                <span onclick="removeCartItem(<?php echo $item['id']; ?>)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div style="padding: 10vh 0;">
                            <p style="text-align: center; font-size:25px">The cart is still empty.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?php echo number_format($total_price, 2); ?></span></li>
                            <li>Total <span>$<?php echo number_format($total_price, 2); ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include './includes/footer.php'; ?>

    <script src="./src/js/jquery-3.3.1.min.js"></script>
    <script src="./src/js/bootstrap.min.js"></script>
    <script src="./src/js/jquery.nice-select.min.js"></script>
    <script src="./src/js/jquery-ui.min.js"></script>
    <script src="./src/js/jquery.slicknav.js"></script>
    <script src="./src/js/mixitup.min.js"></script>
    <script src="./src/js/owl.carousel.min.js"></script>
    <script src="./src/js/main.js"></script>

    <script>
        function updateQuantity(itemId) {
            var quantity = document.getElementById("quantity_" + itemId).value;
            if (quantity < 1) {
                Swal.fire("Quantity must be at least 1!");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update-cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send("item_id=" + itemId + "&quantity=" + quantity);

            xhr.onload = function () {
                if (xhr.status == 200) {
                    Swal.fire('Quantity Updated!', '', 'success').then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Error!', 'Failed to update the quantity', 'error');
                }
            };
        }

        function removeCartItem(itemId) {
            Swal.fire({
                title: 'Do you want to remove this product?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'remove_cart.php?remove_item=' + itemId, true);
                    xhr.send();

                    xhr.onload = function () {
                        if (xhr.status == 200) {
                            Swal.fire({
                                title: 'Removed!',
                                text: 'The product was successfully removed from the cart.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred: ' + xhr.statusText,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    };
                }
            });
        }
    </script>
</body>

</html>