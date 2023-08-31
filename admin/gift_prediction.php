<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
$fetch_pro = $db_handle->runQuery("SELECT * FROM `gifts`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Category | ICHI CATCHER Admin</title>
    <?php include 'include/css.php'; ?>
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
            <!-- Add Category -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Gift Probability (%)</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Update" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 1</label>
                                            <input type="text" class="form-control" placeholder="" name="g1" value="<?php echo $fetch_pro[0]['gift1'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 2</label>
                                            <input type="text" class="form-control" placeholder="" name="g2" value="<?php echo $fetch_pro[0]['gift2'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 3</label>
                                            <input type="text" class="form-control" placeholder="" name="g3" value="<?php echo $fetch_pro[0]['gift3'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 4</label>
                                            <input type="text" class="form-control" placeholder="" name="g4" value="<?php echo $fetch_pro[0]['gift4'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 5</label>
                                            <input type="text" class="form-control" placeholder="" name="g5" value="<?php echo $fetch_pro[0]['gift5'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 6</label>
                                            <input type="text" class="form-control" placeholder="" name="g6" value="<?php echo $fetch_pro[0]['gift6'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 7</label>
                                            <input type="text" class="form-control" placeholder="" name="g7" value="<?php echo $fetch_pro[0]['gift7'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 8</label>
                                            <input type="text" class="form-control" placeholder="" name="g8" value="<?php echo $fetch_pro[0]['gift8'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Gift 9</label>
                                            <input type="text" class="form-control" placeholder="" name="g9" value="<?php echo $fetch_pro[0]['gift9'];?>" required>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50" name="update_probability">Submit</button>
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
</body>
</html>
