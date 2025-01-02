<?php
include 'check.php';

$seller_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../favicon.ico">
    <title>AdminLTE 3 | My Products</title>
    <?php include 'includes/css.php'; ?>
    <link rel="stylesheet" href="../src/css/card.css" type="text/css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <?php
        include 'includes/aside.php';
        active('product', 'products');
        ?>

        <div class="content-wrapper">

            <?php
            $arr = array(
                ["title" => "Home", "url" => "/"],
                ["title" => "Product", "url" => "/"],
                ["title" => "My Products", "url" => "#"],
            );
            pagePath('My Products', $arr);
            ?>


            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <?php $seller_id = $_SESSION['id']; ?>
                    <?php
                    $products = $query->select('products', "*", "WHERE seller_id = '$seller_id' ORDER BY added_to_site DESC");
                    foreach ($products as $product):
                        $productImages = $query->select('product_images', 'image_url', 'WHERE product_id=' . $product['id']);
                        $category_name = $query->select('categories', 'category_name', 'WHERE id=' . $product['category_id'])[0]['category_name'];
                        ?>
                        <div class="col-lg-2 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="../src/images/products/<?php echo $productImages[0]['image_url']; ?>">
                                    <ul class="product__item__pic__hover" style="height: 20px;">
                                        <li><a href="#" onclick="delete_product(<?php echo $product['id']; ?>)"><i
                                                    class="fa fa-trash"></i></a></li>
                                        <li><a href="#" onclick="openProductDetails(<?php echo $product['id']; ?>)"><i
                                                    class="fa fa-retweet"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__discount__item__text">
                                    <span><?php echo $category_name ?></span>
                                    <h5><a href="#"><?php echo $product['name'] ?></a></h5>
                                    <div class="product__item__price">$<?php echo $product['price_current'] ?>
                                        <span>$<?php echo $product['price_old'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <script src="../src/js/jquery.min.js"></script>
    <script src="../src/js/adminlte.js"></script>
    <script src="../src/js/jquery-3.3.1.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/js/jquery.nice-select.min.js"></script>
    <script src="../src/js/jquery-ui.min.js"></script>
    <script src="../src/js/jquery.slicknav.js"></script>
    <script src="../src/js/mixitup.min.js"></script>
    <script src="../src/js/owl.carousel.min.js"></script>
    <script src="../src/js/main.js"></script>

    <script>
        function delete_product(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                window.location.href = 'delete_product.php?product_id=' + productId;
            }
        }

        function openProductDetails(productId) {
            window.location.href = 'shop-details.php?product_id=' + productId;
        }
    </script>
</body>

</html>