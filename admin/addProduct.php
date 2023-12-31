<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Product | ICHI CATCHER Admin</title>
    <?php include 'include/css.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js" integrity="sha512-ff67djVavIxfsnP13CZtuHqf7VyX62ZAObYle+JlObWZvS4/VQkNVaFBOO6eyx2cum8WtiZ0pqyxLCQKC7bjcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <?php include 'include/header.php'; ?>

    <?php include 'include/nav.php'; ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Product -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Product Name * (CN)</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Code</label>
                                            <input type="text" class="form-control" name="product_code" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Select Product Category *</label>
                                            <select class="form-control default-select" id="productCategory" name="product_category" required>
                                                <?php
                                                $cat = $db_handle->runQuery("SELECT * FROM `category`");
                                                $row_count = $db_handle->numRows("SELECT * FROM `category`");
                                                for ($i = 0; $i < $row_count; $i++) {
                                                    ?>
                                                    <option value="<?php echo $cat[$i]["id"]; ?>"><?php echo $cat[$i]["c_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Select Product Sub Category *</label>
                                            <select class="form-control default-select" id="productSubCategory" name="product_subcategory"  required>
                                                <?php
                                                $fetch_sub_cat = $db_handle->runQuery("select * from sub_cat order by id desc");
                                                $no_fetch_sub_cat = $db_handle->numRows("select * from sub_cat order by id desc");
                                                for($i=0; $i < $no_fetch_sub_cat; $i++){
                                                    ?>
                                                    <option value="<?php echo $fetch_sub_cat[$i]["id"]; ?>"><?php echo $fetch_sub_cat[$i]["sub_cat_name"]; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Selling Price * (For Multiple Please Separate with Comma)</label>
                                            <input type="text" class="form-control" placeholder="" name="selling_price" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Image *</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="product_image[]" multiple required>
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Status *</label>
                                            <select class="form-control default-select" id="sel1" name="product_status" required>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Deactivate</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Product Description * (CN)</label>
                                            <textarea class="form-control" rows="4" id="comment" name="product_description" required></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="add_product" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'include/footer.php'; ?>

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<?php include 'include/js.php'; ?>




<!--<script>
        $(document).ready(function() {
        $('#productCategory').change(function() {
            console.log('onchange working');
            let categoryId = $(this).val();

            // Perform AJAX request
            $.ajax({
                url: 'fetch_subcat.php',
                type: 'POST',
                data: { categoryId: categoryId },
                success: function(response) {
                    // Clear existing options
                    $('#productSubCategory').empty();

                    // Append new options
                    $.each(response, function(index, subCategory) {
                        $('#productSubCategory').append($('<option>', {
                            value: subCategory.id,
                            text: subCategory.sub_cat_name
                        }));
                    });
                }
            });
        });
    });
</script>-->

<script>
    CKEDITOR.replace('product_description');
    CKEDITOR.replace('product_description_en');
</script>

</body>
</html>
