<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

if(isset($_POST['delete'])) {
    $ids = isset($_POST['ids']) ? $_POST['ids'] : [];
    foreach($ids as $id) {
        $stmt = $con->prepare("SELECT * FROM services WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $selectdelete = $stmt->get_result();
        if(mysqli_num_rows($selectdelete) > 0) {
            $selectimg = mysqli_fetch_array($selectdelete);
            $path = 'assets/images/service/';
            $img_path = $path . $selectimg['img'];
            if(file_exists($img_path) && is_file($img_path)) {
                unlink($img_path); // Delete image file
            }
            $stmt->close();
            $del_stmt = $con->prepare("DELETE FROM services WHERE id=?");
            $del_stmt->bind_param("i", $id);
            $p = $del_stmt->execute();
            $del_stmt->close();
        } else {
            $stmt->close();
        }
    }
    if($p) {
        echo "<script>alert('Selected servicess deleted successfully');</script>";
    } else {
        echo "<script>alert('Error occurred while deleting servicess');</script>";
    }
    echo "<script>window.location.href = 'view-services.php'</script>";
}

$resultt = mysqli_query($con, "SELECT * FROM services ORDER BY id DESC");
?>
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">IBP Euipment</a></li>
                            <li class="breadcrumb-item"><a href="#">View Services</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">View Services</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                     <th>Select</th>
                                    <th>Image</th>
                                    <th>Services Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                while ($roww = mysqli_fetch_array($resultt)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $index++; ?></td>
                                        <td><input type="checkbox" name="ids[]" value="<?php echo $roww['id']; ?>"></td>
                                        <td><img style="width:50px;"
                                                src="assets/images/service/<?php echo $roww["img"]; ?>"></td>
                                        <td><?php echo $roww["title"]; ?></td>
                                        <td><?php echo $roww["category"]; ?></td>
                                        <td><?php echo substr(strip_tags($roww['short']), 0, 100) . '..'; ?></td>
                                        <td><a href="add-service.php?edit=<?php echo $roww["id"]; ?>"
                                                class="btn btn-success waves-effect waves-light text-white">Edit</a>
                                        </td>
                                        <td><a href="view-services.php?delete_id=<?php echo $roww["id"]; ?>"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger waves-effect waves-light text-white">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button type="submit" name="delete" class="btn btn-danger waves-effect waves-light text-white">Delete Selected</button>
                        </form>
                    </div>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- container -->
</div><!-- Page content Wrapper -->
<?php include './includes/footer.php'; ?>
