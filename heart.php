<?php include 'check.php';
$cartItemsHeart = $query->getWishes($_SESSION['id']);
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
    <title>iMarket | Wish List Products</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./src/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./src/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./src/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./src/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
</style>

<body>

    <?php include './includes/header.php'; ?>


    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (!empty($cartItemsHeart)) {
                        ?>
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Products</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItemsHeart as $item) { ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <div class="product-image">
                                                    <img src="./src/images/products/<?php echo $query->getProductImages($item['product_id'])[0] ?>"
                                                        style="width: 55px;" alt="">
                                                    <h5><?php echo $item['name']; ?></h5>
                                                </div>
                                            </td>

                                            <td class="shoping__cart__price">
                                                <del>$<?php echo number_format($item['price_old'], 2); ?></del>
                                                $<?php echo number_format($item['price_current'], 2); ?>
                                            </td>

                                            <td class="shoping__cart__item__clo">
                                                <div class="action-icons">
                                                    <span onclick="addToCart(<?php echo $item['product_id']; ?>)"
                                                        style="cursor: pointer;">
                                                        <i class="fas fa-cart-plus"></i>
                                                    </span>

                                                    <span onclick="removeCartItem(<?php echo $item['product_id']; ?>)"
                                                        style="cursor: pointer;">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="padding-bottom: 10vh;"></div>
                        <?php
                    } else {
                        ?>
                        <div style="padding: 20vh 0;">
                            <p style="text-align: center; font-size:25px">The liked products are empty.</p>
                        </div>
                        <?php
                    }
                    ?>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function removeCartItem(itemId) {
            Swal.fire({
                title: 'Are you sure you want to remove this product from the list?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'remove_heart.php?remove_item=' + itemId, true);
                    xhr.send();
                    xhr.onload = function () {
                        if (xhr.status == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Product successfully removed!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error occurred!',
                                text: xhr.statusText
                            });
                        }
                    };
                }
            });
        }
    </script>

    <script>
        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added to cart!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            };
        }
    </script>


</body>

</html>