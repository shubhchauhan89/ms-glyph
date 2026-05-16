<?php
error_reporting(0);
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

date_default_timezone_set('Asia/Kolkata');
$today = date("D d M Y");
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';

if (!empty($edit)) {
    $stmt = $con->prepare("SELECT * FROM services where id=?");
    $stmt->bind_param("i", $edit);
    $stmt->execute();
    $resultt = $stmt->get_result();
    $roww = mysqli_fetch_array($resultt);
} else {
    $roww = array(); // Initialize $roww as an empty array if $edit is not set
}

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $short_desc = $_POST['short'];
    $long_desc = $_POST['descrip'];
    $url = $_POST['url'];
    $meta_title = $_POST['services_meta_title'];
    $meta_desc = $_POST['services_meta_desc'];

    if ($_FILES['lis_img']['name'] != '') {
        $lis_img = rand() . $_FILES['lis_img']['name'];
        $tempname = $_FILES['lis_img']['tmp_name'];
        $folder = "assets/images/service/" . $lis_img;
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

    if (empty($edit)) {
        $stmt = $con->prepare("INSERT INTO services(title,category,short,descrip,img,url,date,services_meta_title,services_meta_desc,status) VALUES(?,?,?,?,?,?,?,?,?,'0')");
        $stmt->bind_param("sssssssss", $title, $category, $short_desc, $long_desc, $lis_img, $url, $today, $meta_title, $meta_desc);
        $insertdata = $stmt->execute() or die(mysqli_error($con));
        echo "<script>alert('Posted Successfully');</script>";
    } else {
        $stmt = $con->prepare("UPDATE services SET title=?,category=?,short=?,descrip=?,img=?,url=?,date=?,services_meta_title=?,services_meta_desc=? where id=?");
        $stmt->bind_param("sssssssssi", $title, $category, $short_desc, $long_desc, $lis_img, $url, $today, $meta_title, $meta_desc, $edit);
        $insertdata = $stmt->execute() or die(mysqli_error($con));
        echo "<script>alert('Updated Successfully');</script>";
    }
    echo "<script>window.location.href = 'view-services.php'</script>";
}

// Compress image
function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
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
                            <li class="breadcrumb-item active">Add Services</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Services</h4>
                </div>
            </div>
        </div><!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-6">
                                    <h6 class="input-title mt-0">Services Name</h6>
                                    <input type="text" name="title" value="<?php echo $roww["title"]; ?>" class="form-control" placeholder="Enter Services Name" id="mdate">
                                    <h6 class="input-title">Services Url</h6>
                                    <input type="text" name="url"
                                        value="<?php echo $roww["url"]; ?>"
                                        id="date-format" class="form-control" placeholder="Enter Services Url">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="input-title mt-0">Meta Title</h6>
                                    <input type="text" name="services_meta_title" value="<?php echo $roww["services_meta_title"]; ?>" class="form-control" placeholder="Enter Meta title" id="mdate">
                                    <h6 class="input-title">Meta description</h6>
                                    <textarea type="text" rows="4" name="services_meta_desc"
                                        class="summernote" class="form-control" placeholder="Enter Meta Description"><?php echo $roww["services_meta_desc"]; ?>
                                    </textarea>
                                </div>
                                <div class="col-lg-6 card-body">
                                        <label>Select Category</label>
                                    <select name="category" class="form-control">
                                            <option>Select...</option>
                                            <?php 
                                              $location = mysqli_query($con,"SELECT * FROM services_cat"); 
                                               while ($location_ft = mysqli_fetch_array($location)) {   
                                             ?>
                                            <option
                                                <?php 
                                                  if($roww["services_cat"]==$location_ft["service_cat_name"]){ echo 'selected'; } 
                                                ?>
                                                value="<?php echo $location_ft["service_cat_url"]; ?>">
                                                <?php echo $location_ft["service_cat_name"]; ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Short Description</h4>
                                    <textarea name="short" class="summernote"><?php echo $roww["short"]; ?></textarea>
                                </div>
                                <div class="col-lg-12 card-body">
                                    <h4 class="mt-0 header-title">Long Description</h4>
                                    <textarea name="descrip" class="summernote"><?php echo $roww["descrip"]; ?></textarea>
                                </div>
                                <div class="card-body">
                                    <p>Upload Image</p>
                                    <input type="file" name="lis_img" id="input-file-now bg-primary" class="dropify">
                                    <?php
                                    if (!empty($roww["img"])) {
                                        echo '<img src="assets/images/service/' . $roww["img"] . '" alt="Uploaded Image" style="max-width: 10%; height: auto;">';
                                    }
                                    ?>
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
        </div><!-- end row -->
    </div><!-- container -->
</div><!-- Page content Wrapper -->
<?php
include './includes/footer.php';
?>