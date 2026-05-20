<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

if (isset ($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $con->prepare("DELETE FROM slider WHERE id=?");
    $stmt->bind_param("i", $delete_id);
    $p = $stmt->execute();
    $stmt->close();
    if ($p) {
        echo "<script>alert('Deleted Successfully');</script>";
    } else {
        echo "<script>alert('Deletion Failed');</script>";
    }
    echo "<script>window.location.href = 'slider.php'</script>";
}

$edit = isset ($_GET['edit']) ? $_GET['edit'] : '';

if ($edit != '') {
    $stmt = $con->prepare("SELECT * FROM slider WHERE id=?");
    $stmt->bind_param("i", $edit);
    $stmt->execute();
    $resultt = $stmt->get_result();
    $roww = mysqli_fetch_array($resultt);
    $stmt->close();
} else {
    $roww = array("head" => "", "title" => "", "sub_title" => "", "descrip" => "", "button" => "", "url" => "", "img" => "");
}

$location = mysqli_query($con, "SELECT * FROM slider");

if (isset ($_POST['add'])) {
    $head = $_POST['head'] ?? '';
    $title = $_POST['title'] ?? '';
    $sub_title = $_POST['sub_title'] ?? '';
    $descrip = $_POST['descrip'] ?? '';
    $button = $_POST['button'] ?? '';
    $url = $_POST['url'] ?? '';

    if ($_FILES['lis_img']['name'] != '') {
        $lis_img = rand() . $_FILES['lis_img']['name'];
        $tempname = $_FILES['lis_img']['tmp_name'];
        $folder = "assets/images/slider/" . $lis_img;
        $valid_ext = array('png', 'jpeg', 'jpg');
        $file_extension = pathinfo($folder, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        if (in_array($file_extension, $valid_ext)) {
            if (move_uploaded_file($tempname, $folder)) {
                echo "File uploaded successfully.";
            } else {
                echo "File upload failed.";
            }
        }
    } else {
        $lis_img = $roww["img"];
    }

    if ($edit == '') {
        $stmt = $con->prepare("INSERT INTO slider(head, title, sub_title, descrip, button, url, img) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $head, $title, $sub_title, $descrip, $button, $url, $lis_img);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Added Successfully');</script>";
        echo "<script>window.location.href = 'slider.php'</script>";
    } else {
        $stmt = $con->prepare("UPDATE slider SET head=?, title=?, sub_title=?, descrip=?, button=?, url=?, img=? WHERE id=?");
        $stmt->bind_param("sssssssi", $head, $title, $sub_title, $descrip, $button, $url, $lis_img, $edit);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Updated Successfully');</script>";
        echo "<script>window.location.href = 'slider.php'</script>";
    }
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
                            <li class="breadcrumb-item active">Add slider</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add slider</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-12">
                                    <h6 class="input-title mt-10">Slider Head</h6>
                                    <input type="text" name="head"
                                        value="<?php echo htmlspecialchars($roww["head"]); ?>" class="form-control"
                                        placeholder="Enter slider head" id="mdate">
                                    <h6 class="input-title mt-10">Slider Title</h6>
                                    <input type="text" name="title"
                                        value="<?php echo htmlspecialchars($roww["title"]); ?>" id="date-format"
                                        class="form-control" placeholder="Enter slider title">
                                    <h6 class="input-title mt-10">Slider Sub Title</h6>
                                    <input type="text" name="sub_title"
                                        value="<?php echo htmlspecialchars($roww["sub_title"]); ?>" class="form-control"
                                        placeholder="Enter slider subtitle" id="mdate">
                                </div>
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Description</h4>
                                    <textarea name="descrip"
                                        class="summernote"><?php echo $roww["descrip"]; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <h6 class="input-title mt-10">Slider Button</h6>
                                    <input type="text" name="button"
                                        value="<?php echo htmlspecialchars($roww["button"]); ?>" class="form-control"
                                        placeholder="Enter slider button" id="mdate">
                                    <h6 class="input-title mt-10">Slider Url</h6>
                                    <input type="text" name="url"
                                        value="<?php echo htmlspecialchars($roww["url"]); ?>" id="date-format"
                                        class="form-control" placeholder="Enter slider url">
                                </div>
                                <div class="card-body">
                                    <p>Upload Image</p>
                                    <input type="file" name="lis_img" id="input-file-now" class="dropify">
                                    <p>
                                        <?php echo $roww["img"]; ?>
                                    </p>
                                </div>

                            </div>
                            <div class="button-items">
                                <button type="submit" name="add"
                                    class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0" id="my-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                while ($location_ft = mysqli_fetch_array($location)) {
                                    $old_string = '-';
                                    $new_string = ' ';
                                    $name = $location_ft["title"];
                                    $productname = str_replace($old_string, $new_string, $name);
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $index++; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlspecialchars($productname); ?>
                                        </td>
                                        <td><img src="assets/images/slider/<?php echo $location_ft["img"]; ?>"
                                                width="50px" /></td>
                                        <td>
                                            <a href="slider.php?edit=<?php echo $location_ft["id"]; ?>"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn btn-success waves-effect waves-light text-white">Edit</a>
                                        </td>
                                        <td>
                                            <a href="slider.php?delete_id=<?php echo $location_ft["id"]; ?>"
                                                onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger waves-effect waves-light text-white">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- container -->
</div><!-- Page content Wrapper -->
<?php
include './includes/footer.php';
?>