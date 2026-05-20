<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';
$blog = mysqli_query($con, "SELECT * FROM blog");
$blog_count = mysqli_num_rows($blog);

$service = mysqli_query($con, "SELECT * FROM services");
$service_count = mysqli_num_rows($service);

$product = mysqli_query($con, "SELECT * FROM product");
$product_count = mysqli_num_rows($product);
?>

<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">IBP Equipment</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center"><i
                                                class="fas fa-tasks text-gradient-success"></i></div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1"><?php echo $blog_count; ?></h5>
                                            <p class="mb-0 font-12 text-muted">Active Blog</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body justify-content-center">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center"><i
                                                class="far fa-gem text-gradient-danger"></i></div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1"><?php echo $service_count; ?></h5>
                                            <p class="mb-0 font-12 text-muted">Services</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center"><i
                                                class="fas fa-users text-gradient-warning"></i></div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1"><?php echo $product_count; ?></h5>
                                            <p class="mb-0 font-12 text-muted">Product</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon-contain">
                                    <div class="row">
                                        <div class="col-2 align-self-center"><i
                                                class="fas fa-database text-gradient-primary"></i></div>
                                        <div class="col-10 text-right">
                                            <h5 class="mt-0 mb-1">$15562</h5>
                                            <p class="mb-0 font-12 text-muted">Budget</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group btn-group-toggle float-right" data-toggle="buttons"><label
                                class="btn btn-primary btn-sm active"><input type="radio" name="options" id="option1"
                                    checked=""> This Week</label> <label class="btn btn-primary btn-sm"><input
                                    type="radio" name="options" id="option2"> Last Month</label></div>
                        <h5 class="header-title mb-4 mt-0">Weekly Record</h5><canvas id="lineChart"
                            height="82"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- container -->
</div><!-- Page content Wrapper -->
</div><!-- content -->
<?php
include './includes/footer.php';
?>