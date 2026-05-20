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
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="header-title pb-3 mt-0">Payments</h5>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="align-self-center">
                                        <th>Project Name</th>
                                        <th>Client Name</th>
                                        <th>Payment Type</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product Devlopment</td>
                                        <td><img src="assets/images/users/avatar-1.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Kevin Heal</td>
                                        <td>Paypal</td>
                                        <td>5/8/2018</td>
                                        <td>$15,000</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">panding</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>New Office Building</td>
                                        <td><img src="assets/images/users/avatar-2.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Frank M. Lyons
                                        </td>
                                        <td>Paypal</td>
                                        <td>15/7/2018</td>
                                        <td>$35,000</td>
                                        <td><span class="badge badge-boxed badge-soft-primary">Success</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Market Research</td>
                                        <td><img src="assets/images/users/avatar-3.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Angelo Butler</td>
                                        <td>Pioneer</td>
                                        <td>30/9/2018</td>
                                        <td>$45,000</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">Panding</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Website &amp; Blog</td>
                                        <td><img src="assets/images/users/avatar-4.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Phillip Morse</td>
                                        <td>Paypal</td>
                                        <td>2/6/2018</td>
                                        <td>$70,000</td>
                                        <td><span class="badge badge-boxed badge-soft-warning">Success</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Devlopment</td>
                                        <td><img src="assets/images/users/avatar-5.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Kevin Heal</td>
                                        <td>Paypal</td>
                                        <td>5/8/2018</td>
                                        <td>$15,000</td>
                                        <td><span class="badge badge-boxed badge-soft-primary">panding</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>New Office Building</td>
                                        <td><img src="assets/images/users/avatar-6.jpg" alt=""
                                                class="thumb-sm rounded-circle mr-2"> Frank M. Lyons
                                        </td>
                                        <td>Paypal</td>
                                        <td>15/7/2018</td>
                                        <td>$35,000</td>
                                        <td><span class="badge badge-boxed badge-soft-primary">Success</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!--end table-responsive-->
                        <div class="pt-3 border-top text-right"><a href="#" class="text-primary">View
                                all <i class="mdi mdi-arrow-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
</div><!-- Page content Wrapper -->
</div><!-- content -->
<?php
include './includes/footer.php';
?>