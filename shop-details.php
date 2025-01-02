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
    <link rel="icon" href="./favicon.ico">
    <title>Product | <?php echo $product['name']; ?></title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <?php include './includes/header.php'; ?>

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <?php
                            $arr = $query->getProductImageID($product_id);
                            echo '<img " class="product__details__pic__item--large" src="' . "./src/images/products/" . $query->getProductImage($arr[0]) . '" alt="">';
                            ?>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                            foreach ($arr as $id) {
                                if (count($arr)) {
                                    echo '<img data-imgbigurl="' . "./src/images/products/" . $query->getProductImage($id) . '" src="' . "./src/images/products/" . $query->getProductImage($id) . '" alt="">';
                                } elseif ($id + 1 <= end($arr)) {
                                    echo '<img data-imgbigurl="' . "./src/images/products/" . $query->getProductImage($id + 1) . '" src="' . "./src/images/products/" . $query->getProductImage($id) . '" alt="">';
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

                        <p style="text-align: justify;">
                            <b>Product details:</b>
                            <span style="white-space: pre-wrap;"><?= $product['description']; ?></span>
                        </p>

                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a onclick="addToCart(<?php echo $product_id; ?>, document.querySelector('.pro-qty input').value)"
                            class="primary-btn" style="color: white">Add to Cart</a>
                        <a onclick="addToWishlist(<?php echo $product_id; ?>)" class="heart-icon">
                            <i class="fas fa-heart"></i>
                        </a>

                        <ul>
                            <li><b>Category</b>
                                <span><?php echo $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'] ?></span>
                            </li>
                            <li><b>Rating</b> <span><?php echo $product['rating']; ?></span></li>
                            <li><b>Quantity</b> <span><?php echo $product['quantity']; ?></span></li>
                            <li><b>Number of
                                    sales</b><?= $query->executeQuery("SELECT SUM(number_of_products) AS total_sales FROM cart WHERE product_id = $product_id")->fetch_all()[0][0] ?? 0 ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                data-setbg="./src/images/products/<?php echo $image ?>">
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
        function addToCart(productId, quantity) {
            var xhr = new XMLHttpRequest();
            var url = 'add_to_cart.php?product_id=' + productId + '&quantity=' + quantity;
            xhr.open('GET', url, true);
            xhr.send();

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added to cart!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.reload();
                    });
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

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added to wishlist!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            };
        }
    </script>

</body>

</html>