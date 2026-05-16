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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title><?php echo htmlspecialchars($roww["site_name"]); ?> </title>
    <meta content="Blueprint Management System" name="description">
    <meta content="MS Glyph" name="author">
    <link rel="shortcut icon" href="assets/images/<?php echo htmlspecialchars($roww['favicon_logo']); ?>">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --white: #FFFFFF;
            --slate-gray: #64748b;
            --navy: #0a192f;
            --light-gray: #f1f5f9;
        }

        body {
            background-color: var(--white) !important;
            font-family: 'Inter', sans-serif !important;
            color: var(--slate-gray) !important;
        }

        h1, h2, h3, h4, h5, h6, .card-title, .page-title, label {
            color: var(--navy) !important;
            font-family: 'Inter', sans-serif !important;
        }

        .card, .box, .panel {
            border: 1px solid var(--light-gray) !important;
            box-shadow: none !important;
            background: var(--white) !important;
        }

        /* Buttons */
        .btn-primary, .btn-success, .btn-info, .btn-danger, .btn-warning, .btn-submit {
            background-color: var(--navy) !important;
            color: #ffffff !important;
            border: 1px solid var(--navy) !important;
            box-shadow: none !important;
            border-radius: 4px !important;
        }
        
        .btn-secondary, .btn-light, .btn-outline, .btn-custom {
            background-color: var(--white) !important;
            color: var(--slate-gray) !important;
            border: 1px solid var(--slate-gray) !important;
            box-shadow: none !important;
            border-radius: 4px !important;
        }

        /* Tables/Lists */
        table.dataTable, .table {
            border-collapse: collapse !important;
            border: 1px solid var(--light-gray) !important;
        }

        .table th, table.dataTable thead th {
            text-transform: uppercase !important;
            font-size: 11px !important;
            letter-spacing: 1px !important;
            color: var(--navy) !important;
            background-color: var(--white) !important;
            border-bottom: 1px solid var(--light-gray) !important;
            padding: 15px !important;
        }

        .table td, table.dataTable tbody td {
            padding: 15px !important;
            border-bottom: 1px solid var(--light-gray) !important;
            color: var(--slate-gray) !important;
            vertical-align: middle !important;
        }
        
        .wrapper-page { background: var(--white) !important; }

        /* General border standard */
        * {
            box-shadow: none !important;
        }
        
        hr, .dropdown-divider {
            border-top: 1px solid var(--light-gray) !important;
        }
        
        /* Removing dark mode elements */
        .bg-dark, .bg-secondary, .bg-primary {
            background-color: var(--white) !important;
            color: var(--slate-gray) !important;
        }

        /* Sidebar overrides */
        .side-menu {
            background-color: var(--white) !important;
            border-right: 1px solid var(--light-gray) !important;
        }
        .topbar-left {
            background-color: var(--white) !important;
            border-bottom: 1px solid var(--light-gray) !important;
            border-right: 1px solid var(--light-gray) !important;
        }
        #sidebar-menu > ul > li > a {
            background-color: transparent !important;
            color: var(--slate-gray) !important;
            border-left: 2px solid transparent !important;
            transition: all 0.3s ease;
        }
        #sidebar-menu > ul > li > a:hover, #sidebar-menu > ul > li > a.active, #sidebar-menu > ul > li > a.subdrop {
            color: var(--navy) !important;
            border-left: 2px solid var(--navy) !important;
            background-color: transparent !important;
        }
        #sidebar-menu ul ul a {
            color: var(--slate-gray) !important;
        }
        #sidebar-menu ul ul a:hover {
            color: var(--navy) !important;
        }
        #sidebar-menu i {
            color: inherit !important;
        }

        /* Topbar overrides */
        .topbar .navbar-custom {
            background-color: var(--white) !important;
            border-bottom: 1px solid var(--light-gray) !important;
            box-shadow: none !important;
        }
        
        /* Footer overrides */
        .footer {
            background-color: var(--white) !important;
            border-top: 1px solid var(--light-gray) !important;
            color: var(--slate-gray) !important;
            text-align: center;
        }
    </style>
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