<?php

session_start();

include 'config.php';
$query = new Query();
$query->checkUserRole();

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
    <title>Saralangan mahsulotlar</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <?php include 'header.php'; ?>


    <!-- Shoping Cart Section Begin -->
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
                                        <th class="shoping__product">Mahsulotlar</th>
                                        <th>Narx</th>
                                        <th>Hozirgi</th>
                                        <th>Savatga qo'shish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartItemsHeart as $item) { ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <!-- Mahsulot rasmi -->
                                                <img src="images/products/<?php echo $query->getProductImages($item['product_id'])[0] ?>" style="width: 55px;" alt="">
                                                <!-- Mahsulot nomi -->
                                                <h5><?php echo $item['name']; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                <!-- Mahsulot narxi -->
                                                $<?php echo number_format($item['price_old'], 2); ?>
                                            </td>

                                            <td class="shoping__cart__total">
                                                <!-- Jami narxi -->
                                                $<?php echo number_format($item['price_current'], 2); ?>
                                            </td>
                                            <td>
                                                <a class="primary-btn" style="color: white;" onclick="addToCart(<?php echo $item['product_id']; ?>)">Savatga qo'shish</a>
                                            </td>
                                            <td class="shoping__car t__item__close">
                                                <span class="icon_close" onclick="removeCartItem(<?php echo $item['product_id']; ?>)"></span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="padding-bottom: 30vh;"></div>
                    <?php
                    } else {
                    ?>
                        <div style="padding-bottom: 30vh;">
                            <p style="text-align: center; font-size:25px">Hech qanday mahsulot topilmadi.</p>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function removeCartItem(itemId) {
            if (confirm('Haqiqatdan ham ushbu mahsulotni savatdan o\'chirmoqchimisiz?')) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'remove_heart.php?remove_item=' + itemId, true);
                xhr.send();
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        window.location.reload();
                    } else {
                        alert('Xato yuz berdi: ' + xhr.statusText);
                    }
                };
            }
        }
    </script>

    <script>
        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Mahsulot savatchaga qo\'shildi!');
                }
            };
            window.location.reload();
        }
    </script>

</body>

</html>