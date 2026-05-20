<?php
include './includes/conn.php';

session_start();

if (isset ($_SESSION['ad_id'])) {
    header('Location:index.php');
    exit(); // Ensure script stops here to prevent further execution
}

$msg = "";

if (isset ($_POST['submit'])) {
    $email = $_POST['ad_email'];
    $pass = $_POST['ad_pass'];
    $stmt = $con->prepare("SELECT * FROM admin WHERE ad_email=? AND ad_password=?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $sql = $stmt->get_result();
    $row = mysqli_fetch_array($sql);
    $stmt->close();
    if (is_array($row)) {
        $_SESSION['ad_id'] = $row['ad_id'];
        header("Location:index.php");
        exit(); // Ensure script stops here to prevent further execution
    } else {
        $msg = "Invalid Email or Password";
    }
}
date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");

$settings = mysqli_query($con, "SELECT * FROM settings where id='1'");
$roww = mysqli_fetch_array($settings);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title><?php echo htmlspecialchars($roww["site_name"]); ?></title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo $domain; ?>admin/assets/images/<?php echo htmlspecialchars($roww['favicon_logo']); ?>">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="text-center m-b-15">
                    <a href="index.php" class="logo logo-admin"><img src="<?php echo $domain; ?>admin/assets/images/<?php echo htmlspecialchars($roww['header_logo']); ?>" height="150"
                            alt="logo">
                    </a>
                </div>
                <div class="p-3">
                    <form class="form-horizontal m-t-20" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="ad_email" type="email" required=""
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="ad_pass" type="password" required=""
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit"
                                    name="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script><!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>