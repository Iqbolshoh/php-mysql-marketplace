<?php include '../config.php';
$query = new Query;
$query->checkSellerRole();

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = $query->select('products', "*", "WHERE id = $product_id")[0];
    $categories = $query->getCategories();
} else {
    header("Location: ./");
    exit();
}

?>

<?php
$seller_id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <!-- css -->
    <?php include 'includes/css.php'; ?>
    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/card.css" type="text/css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'includes/navbar.php'; ?>


        <!-- Main Sidebar Container -->
        <?php
        include 'includes/aside.php';
        active('product', 'products');
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <?php
            $arr = array(
                ["title" => "Home", "url" => "/"],
                ["title" => "Mahsulot", "url" => "/"],
                ["title" => "Mahsulotlarim", "url" => "#"],
            );
            pagePath('Mahsulotlarim', $arr);
            ?>


            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Mahsulotni tahrirlash</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="update_product.php" method="POST" enctype="multipart/form-data" onsubmit="return checkFilesCount()">
                                    <div class="card-body">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <div class="form-group">
                                            <label for="name">Mahsulot nomi:</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">Mahsulot Kategoriyasi:</label>
                                            <select class="form-control" id="category_id" name="category_id" required>
                                                <?php foreach ($categories as $id => $category_name) { ?>
                                                    <option value="<?php echo $id; ?>" <?php if ($id == $product['category_id']) echo 'selected'; ?>><?php echo $category_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price_old">Eski narxi:</label>
                                            <input type="number" class="form-control" id="price_old" name="price_old" value="<?php echo $product['price_old']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price_current">Joriy narxi:</label>
                                            <input type="number" class="form-control" id="price_current" name="price_current" value="<?php echo $product['price_current']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Ta'rif:</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image[]" accept="image/*" multiple>
                                            <label class="custom-file-label" for="image">Rasmlarni tanlang...</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Miqdor:</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Saqlash</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

            </section>
        </div>

        <!-- Main Footer -->
        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/adminlte.js"></script>
    <!-- Js Plugins -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        function delete_product(productId) {
            if (confirm("Mahsulotni o'chirmoqchimisiz?")) {
                window.location.href = 'delete_product.php?product_id=' + productId;
            }
        }

        function edit_product(productId) {
            window.location.href = 'edit_product.php?product_id=' + productId;
        }

        function openProductDetails(productId) {
            window.location.href = 'shop-details.php?product_id=' + productId;
        }
    </script>
    <script>
        function checkFilesCount() {
            let files = document.getElementById('image').files;
            if (files.length > 7) {
                alert("Siz faqatgina maksimum 7ta rasmlarni tanlashingiz mumkin.");
                return false;
            }
            return true;
        }

        document.getElementById('image').addEventListener('change', function() {
            let files = document.getElementById('image').files;
            let fileLabel = document.querySelector('.custom-file-label');
            fileLabel.textContent = files.length + ' fayl tanlandi.';
        });
    </script>
</body>

</html>