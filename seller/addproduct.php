<?php include 'check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../favicon.ico">
  <title>Seller | Add Product</title>
  <?php include 'includes/css.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <?php
    include 'includes/aside.php';
    active('product', 'addproduct');
    ?>

    <div class="content-wrapper">

      <?php
      $arr = array(
        ["title" => "Home", "url" => "/"],
        ["title" => "Product", "url" => "/"],
        ["title" => "Add", "url" => "#"],
      );
      pagePath('Add Product', $arr);
      ?>

      <section class="content">
        <section class="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="card">
                  <div class="card-body">
                    <h4>Add Product</h4>
                    <form action="add_product.php" method="POST" enctype="multipart/form-data"
                      onsubmit="return checkFilesCount()">
                      <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="30">
                      </div>
                      <div class="form-group">
                        <label for="category_id">Product Category:</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                          <?php
                          $categories = $query->getCategories();
                          foreach ($categories as $id => $category_name) {
                            echo "<option value='" . $id . "'>" . $category_name . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="price_old">Old Price:</label>
                        <input type="number" class="form-control" id="price_old" name="price_old" required
                          max="99999999999">
                      </div>
                      <div class="form-group">
                        <label for="price_current">Current Price:</label>
                        <input type="number" class="form-control" id="price_current" name="price_current"
                          max="99999999999">
                      </div>
                      <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required
                          maxlength="2000"></textarea>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image[]" accept="image/*"
                          multiple>
                        <label class="custom-file-label" for="image">Select images...</label>
                      </div>
                      <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required
                          max="99999999999">
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/adminlte.js"></script>
  <script>
    function checkFilesCount() {
      let files = document.getElementById('image').files;
      let fileLabel = document.getElementById('fileLabel');
      if (files.length > 7) {
        alert("You can only select up to 7 images.");
        return false;
      }
      return true;
    }

    document.getElementById('image').addEventListener('change', function () {
      let files = document.getElementById('image').files;
      let fileLabel = document.getElementById('fileLabel');
      fileLabel.textContent = files.length + ' files selected.';
    });
  </script>
</body>

</html>