<?php
include 'check.php';

$cartItems = $query->getCartItems($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta ma'lumotlari va CSS fayllari -->
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./favicon.ico">
    <title>Savat</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- CSS stil fayllari -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Savat bo'limi -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (!empty($cartItems)) { ?>
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">Mahsulotlar</th>
                                        <th>Narx</th>
                                        <th>Soni</th>
                                        <th>Jami</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Har bir mahsulot uchun -->
                                    <?php foreach ($cartItems as $item) { ?>
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <!-- Mahsulot rasmi -->
                                                <img src="images/products/<?php echo $query->getProductImages($item['id'])[0] ?>"
                                                    style="width: 55px;" alt="">
                                                <!-- Mahsulot nomi -->
                                                <h5><?php echo $item['name']; ?></h5>
                                            </td>
                                            <!-- Mahsulot narxi -->
                                            <td class="shoping__cart__price">
                                                $<?php echo number_format($item['price_current'], 2); ?>
                                            </td>
                                            <!-- Mahsulot soni -->
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <?php echo $item['number_of_products']; ?>
                                                </div>
                                            </td>
                                            <!-- Mahsulot jami narxi -->
                                            <td class="shoping__cart__total">
                                                $<?php echo number_format($item['total_price'], 2); ?>
                                            </td>
                                            <!-- Mahsulotni savatdan o'chirish -->
                                            <td class="shoping__cart__item__close">
                                                <span onclick="removeCartItem(<?php echo $item['id']; ?>)" style="cursor: pointer;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else {
                        echo "<p>Hech qanday mahsulot topilmadi.</p>";
                    } ?>
                </div>
            </div>

            <!-- Savat tugmalar -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <!-- Xaridni davom ettirish tugmasi -->
                        <a href="#" class="primary-btn cart-btn">Xaridni davom ettirish</a>
                        <!-- Savatni yangilash tugmasi -->
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Savatni yangilash
                        </a>
                    </div>
                </div>

                <!-- Chegirma kodlari bo'limi -->
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Chegirma kodlari</h5>
                            <form action="#">
                                <!-- Chegirma kodi kiritish oynasi -->
                                <input type="text" placeholder="Enter your coupon code">
                                <!-- Chegirma kodini jo'natish tugmasi -->
                                <button type="submit" class="site-btn">KUPON QO'LLANISH</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Savat jami narxi -->
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Savat jami</h5>
                        <ul>
                            <!-- Oraliq jami narx -->
                            <li>Oraliq jami <span>$<?php echo number_format($total_price, 2); ?></span></li>
                            <!-- Jami narx -->
                            <li>Jami <span>$<?php echo number_format($total_price, 2); ?></span></li>
                        </ul>
                        <!-- Xarid qilish tugmasi -->
                        <a href="#" class="primary-btn">Xarid qilish</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- JavaScript -->
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
            Swal.fire({
                title: 'Mahsulotni o‘chirishni xohlaysizmi?',
                text: "Bu amalni qaytarib bo'lmaydi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ha, o‘chirish!',
                cancelButtonText: 'Bekor qilish'
            }).then((result) => {
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'remove_cart.php?remove_item=' + itemId, true);
                    xhr.send();

                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            Swal.fire({
                                title: 'O‘chirildi!',
                                text: 'Mahsulot savatdan muvaffaqiyatli o‘chirildi.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            // Xato xabari
                            Swal.fire({
                                title: 'Xatolik!',
                                text: 'Xato yuz berdi: ' + xhr.statusText,
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