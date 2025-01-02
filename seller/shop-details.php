<?php
include 'check.php';

$product_id = $query->validate($_GET['product_id']);
if (!is_numeric($product_id) or $query->select('products', 'id', 'where id = ' . $product_id)[0]['id'] !== $product_id) {
    header("Location: /");
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
    <link rel="icon" href="../favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../src/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../src/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../src/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../src/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../src/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../src/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../src/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../src/css/style.css" type="text/css">
</head>

<body>

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <?php
                            $arr = $query->getProductImageID($product_id);
                            echo '<img " class="product__details__pic__item--large" src="' . "../src/images/products/" . $query->getProductImage($arr[0]) . '" alt="">';
                            ?>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                            foreach ($arr as $id) {
                                if (count($arr)) {
                                    echo '<img data-imgbigurl="' . "../src/images/products/" . $query->getProductImage($id) . '" src="' . "../src/images/products/" . $query->getProductImage($id) . '" alt="">';
                                } elseif ($id + 1 <= end($arr)) {
                                    echo '<img data-imgbigurl="' . "../src/images/products/" . $query->getProductImage($id + 1) . '" src="' . "../src/images/products/" . $query->getProductImage($id) . '" alt="">';
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

                        <a href="/" class="primary-btn">Back to Products</a>
                        <ul>
                            <li><b>Category</b>
                                <span><? echo $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'] ?></span>
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

    <?php include '../includes/footer.php'; ?>

    <script src="../src/js/jquery-3.3.1.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/js/jquery.nice-select.min.js"></script>
    <script src="../src/js/jquery-ui.min.js"></script>
    <script src="../src/js/jquery.slicknav.js"></script>
    <script src="../src/js/mixitup.min.js"></script>
    <script src="../src/js/owl.carousel.min.js"></script>
    <script src="../src/js/main.js"></script>

    <script>
        function openProductDetails(productId) {
            window.location.href = 'shop-details.php?product_id=' + productId;
        }
    </script>

</body>

</html>