<?php include 'config.php';
$query = new Query;
$query->checkUserRole();
?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iMarket</title>

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

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Categoriya</h4>
                            <ul>
                                <?php
                                $categories = $query->select('categories', '*');
                                foreach ($categories as $category): ?>
                                    <li><a
                                            href="category.php?category=<?php echo $category['id'] ?>"><?php echo $category['category_name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <?php
                            $result = $query->executeQuery("SELECT MIN(price_current) AS min_price, MAX(price_current) AS max_price FROM products");
                            $row = $result->fetch_assoc();
                            $min_price = $row['min_price'];
                            $max_price = $row['max_price'];
                            ?>

                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="<?php echo $min_price; ?>" data-max="<?php echo $max_price; ?>">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount" value="<?php echo $min_price; ?>">
                                        <input type="text" id="maxamount" value="<?php echo $max_price; ?>">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <?php
                    $categories = $query->select('categories', '*', 'LIMIT 3');
                    foreach ($categories as $category): ?>


                        <div class="product__discount">
                            <div class="section-title product__discount__title">

                                <h2><?php echo $category['category_name']; ?></h2>

                            </div>
                            <div class="row">
                                <div class="product__discount__slider owl-carousel">
                                    <?php
                                    $products = $query->select('products', '*', 'WHERE category_id = ' . $category['id'] . ' LIMIT 6');

                                    foreach ($products as $product):
                                        $product_name = $product['name'];
                                        $category_name = $category['category_name'];
                                        ;
                                        $price_current = $product['price_current'];
                                        $price_old = $product['price_old'];
                                        $product_id = $product['id'];
                                        $image = $query->select('product_images', 'image_url', "where product_id = '$product_id'")[0]['image_url'];
                                        ?>

                                        <div class="col-lg-4">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg"
                                                    data-setbg="images/products/<?php echo $image ?>">
                                                    <ul class="product__item__pic__hover">
                                                        <li><a onclick="addToWishlist(<?php echo $product_id; ?>)"><i
                                                                    class="fa fa-heart"></i></a></li>
                                                        <li><a onclick="openProductDetails(<?php echo $product_id; ?>)"><i
                                                                    class="fa fa-retweet"></i></a></li>
                                                        <li><a onclick="addToCart(<?php echo $product_id; ?>)"><i
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

                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $products = $query->select('products', '*', "LIMIT 15");
                        foreach ($products as $product):
                            $product_name = $product['name'];
                            $category_name = $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'];
                            $price_current = $product['price_current'];
                            $price_old = $product['price_old'];
                            $product_id = $product['id'];
                            $image = $query->select('product_images', 'image_url', "where product_id = '$product_id'")[0]['image_url'];
                            ?>

                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="images/products/<?php echo $image ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a onclick="addToWishlist(<?php echo $product_id; ?>)"><i
                                                        class="fa fa-heart"></i></a></li>
                                            <li><a onclick="openProductDetails(<?php echo $product_id; ?>)"><i
                                                        class="fa fa-retweet"></i></a></li>
                                            <li><a onclick="addToCart(<?php echo $product_id; ?>)"><i
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

                        <?php endforeach ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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
        $(function () {
            var min_price = <?php echo $min_price; ?>;
            var max_price = <?php echo $max_price; ?>;

            $(".price-range").slider({
                range: true,
                min: min_price,
                max: max_price,
                values: [min_price, max_price],
                slide: function (event, ui) {
                    $("#minamount").val(ui.values[0]);
                    $("#maxamount").val(ui.values[1]);
                }
            });
            $("#minamount").val($(".price-range").slider("values", 0));
            $("#maxamount").val($(".price-range").slider("values", 1));
        });
    </script>
    <script>
        function addToCart(productId) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert('Mahsulot savatchaga qo\'shildi!');
                    window.location.reload();

                }
            };
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

        function openProductDetails(productId) {
            window.location.href = 'shop-details.php?product_id=' + productId;
        }
    </script>

</body>

</html>