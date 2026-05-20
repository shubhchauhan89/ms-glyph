<?php
include './includes/conn.php';

date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");
//$edit = $_GET['edit'];

$settings = mysqli_query($con, "SELECT * FROM settings where id='1'");
$roww = mysqli_fetch_array($settings);
$edit = $roww['id'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mannatthemes.com/zoogler/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2024 06:10:40 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title><?php echo htmlspecialchars($roww["site_name"]); ?> </title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="assets/images/<?php echo htmlspecialchars($roww['favicon_logo']); ?>">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left"><!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <div id="wrapper">
        <?php include './includes/sidebar.php' ?>
        <!-- Start right Content here -->
        <div class="content-page"><!-- Start content -->
            <div class="content">
                <?php include './includes/topbar.php' ?>