<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';
?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">IBP Equipment</a></li>
                            <li class="breadcrumb-item active">Add Settings</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add settings</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-2">
                                    <label class="input-title mt-4" for="colorPicker">Select Color:</label>
                                    <input type="color" id="colorPicker" class="form-control">
                                </div>
                            </div>
                            <div class="button-items">
                                <button id="submitBtn"
                                    class="btn btn-primary waves-effect waves-light mt-4">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- container -->
    </div><!-- Page content Wrapper -->
    <?php
    include './includes/footer.php';
    ?>