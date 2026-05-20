<?php
include './includes/auth.php';
include './includes/header.php';


date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");

$edit = 1; // Assuming you want to edit the record with id 1
$stmt = $con->prepare("SELECT * FROM tag WHERE id = ?");
$stmt->bind_param("i", $edit);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $header = $_POST['header'] ?? '';
    $body = $_POST['body'] ?? '';
    $footer = $_POST['footer'] ?? '';

    if (empty($row)) {
        $stmt = $con->prepare("INSERT INTO tag (header, body, footer) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $header, $body, $footer);
    } else {
        $stmt = $con->prepare("UPDATE tag SET header = ?, body = ?, footer = ? WHERE id = ?");
        $stmt->bind_param("sssi", $header, $body, $footer, $edit);
    }

    $success = $stmt->execute();
    $stmt->close();

    if ($success) {
        echo "<script>alert('" . (empty($row) ? "Posted" : "Updated") . " Successfully');</script>";
    } else {
        echo "<script>alert('Failed to " . (empty($row) ? "post" : "update") . ".');</script>";
    }

    echo "<script>window.location.href = 'tag.php'</script>";
}
?>
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">IBP Equipment</a></li>
                            <li class="breadcrumb-item active">Add Tag</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Tag</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-8">
                                    <h6 class="input-title mt-4">Header Code</h6>
                                    <textarea rows="8" name="header" class="form-control" placeholder="Enter Header Code"><?php echo htmlspecialchars($row["header"] ?? ''); ?></textarea>
                                    
                                    <h6 class="input-title mt-4">Body Code</h6>
                                    <textarea rows="8" name="body" class="form-control" placeholder="Enter Body Code"><?php echo htmlspecialchars($row["body"] ?? ''); ?></textarea>
                                    
                                    <h6 class="input-title mt-4">Footer Code</h6>
                                    <textarea rows="8" name="footer" class="form-control" placeholder="Enter Footer Code"><?php echo htmlspecialchars($row["footer"] ?? ''); ?></textarea>
                                </div>
                            </div>
                            <div class="button-items">
                                <button type="submit" name="add" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- container -->
    </div><!-- Page content Wrapper -->
</div>
<?php
include './includes/footer.php';
?>
