<?php include 'check.php'; ?>

<?php
$product_id = $query->validate($_GET['product_id']);
if (!is_numeric($product_id) or $query->select('products', 'id', 'where id = ' . $product_id)[0]['id'] !== $product_id) {
    header("Location: ./");
    exit;
}

$product = $query->getProduct($product_id);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | <?php echo $product['name']; ?></title>

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

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <?php
                            $arr = $query->getProductImageID($product_id);
                            echo '<img " class="product__details__pic__item--large" src="' . "images/products/" . $query->getProductImage($arr[0]) . '" alt="">';
                            ?>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                            foreach ($arr as $id) {
                                if (count($arr)) {
                                    echo '<img data-imgbigurl="' . "images/products/" . $query->getProductImage($id) . '" src="' . "images/products/" . $query->getProductImage($id) . '" alt="">';
                                } elseif ($id + 1 <= end($arr)) {
                                    echo '<img data-imgbigurl="' . "images/products/" . $query->getProductImage($id + 1) . '" src="' . "images/products/" . $query->getProductImage($id) . '" alt="">';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $product['name']; ?></h3>
                        <div class="product-price">
                            <div class="product__item__price">$<?php echo $product['price_current'] ?>
                                <span>$<?php echo $product['price_old'] ?></span>
                            </div>
                        </div>
                        <p><?php echo $product['description'] ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a onclick="addToCart(<?php echo $product_id; ?>, document.querySelector('.pro-qty input').value)"
                            class="primary-btn" style="color: white">Savatga qo'shish</a>
                        <a onclick="addToWishlist(<?php echo $product_id; ?>)" class="heart-icon"><span
                                class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Categoriya</b>
                                <span><? echo $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'] ?></span>
                            </li>


                            <li><b>Reyting</b> <span><?php echo $product['rating']; ?></span></li>
                            <li><b>Miqdori</b> <span><?php echo $product['quantity']; ?></span></li>
                            <li><b>Jo'natish</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $products = $query->select('products', '*', "WHERE category_id = '" . $product['category_id'] . "' LIMIT 8");
                foreach ($products as $product):
                    $product_name = $product['name'];
                    $category_name = $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'];
                    $price_current = $product['price_current'];
                    $price_old = $product['price_old'];
                    $product_id = $product['id'];
                    $image = $query->select('product_images', 'image_url', "where product_id = '$product_id'")[0]['image_url'];
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__discount__item">
                            <div class="product__discount__item__pic set-bg"
                                data-setbg="images/products/<?php echo $image ?>">
                                <ul class="product__item__pic__hover">
                                    <li><a onclick="addToWishlist(<?php echo $product_id; ?>)"><i
                                                class="fa fa-heart"></i></a></li>
                                    <li><a onclick="openProductDetails(<?php echo $product_id; ?>)"><i
                                                class="fa fa-retweet"></i></a></li>
                                    <li><a onclick="addToCart(<?php echo $product_id; ?>, 1)"><i
                                                class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                                <span><?php echo $category_name; ?></span>
                                <h5><a
                                        onclick="openProductDetails(<?php echo $product_id; ?>)"><?php echo $product_name; ?></a>
                                </h5>
                                <div class="product__item__price">$<?php echo $price_current; ?>
                                    <span>$<?php echo $price_old; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- Related Product Section End -->

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
        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Mahsulot savatchaga qo\'shildi!');
                }
            };
        }

        function addToCart(productId, quantity) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId + '&quantity=' + quantity;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Mahsulot savatchaga qo\'shildi!');
                    window.location.reload();
                }
            };
        }

        function openProductDetails(productId) {
            window.location.href = 'shop-details.php?product_id=' + productId;
        }

        function addToWishlist(productId) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_wishlist.php?product_id=' + productId;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Mahsulot izohga qo\'shildi!');
                    window.location.reload();
                }
            };
        }
    </script>

</body>

</html>