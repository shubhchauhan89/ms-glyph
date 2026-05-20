<?php
include './includes/auth.php';
include './includes/header.php';
include './includes/conn.php';

// Function to fetch menu options recursively
function buildMenuOptions($con, $roww, $parent_id = NULL, $level = 0) {
    if (is_null($parent_id)) {
        $stmt = $con->prepare("SELECT * FROM menu WHERE parent_id IS NULL ORDER BY position ASC");
    } else {
        $stmt = $con->prepare("SELECT * FROM menu WHERE parent_id = ? ORDER BY position ASC");
        $stmt->bind_param("i", $parent_id);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = mysqli_fetch_assoc($result)) {
        $selected = isset($roww['parent_id']) && $roww['parent_id'] == $row['id'] ? 'selected' : '';
        echo "<option value='{$row['id']}' $selected>" . str_repeat('--', $level) . " {$row['menu_name']}</option>";
        buildMenuOptions($con, $roww, $row['id'], $level + 1);
    }
    $stmt->close();
}

// Process deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $stmt = $con->prepare("DELETE FROM menu WHERE id=?");
    $stmt->bind_param("i", $delete_id);
    $result = $stmt->execute();
    $stmt->close();

    echo "<script>alert('" . ($result ? "Deleted Successfully" : "Deletion Failed") . "');</script>";
    echo "<script>window.location.href = 'menu.php'</script>";
}

// Process editing
$edit = isset($_GET['edit']) ? $_GET['edit'] : '';
if ($edit != '') {
    $stmt = $con->prepare("SELECT * FROM menu WHERE id=?");
    $stmt->bind_param("i", $edit);
    $stmt->execute();
    $edit_result = $stmt->get_result();
    $roww = mysqli_fetch_array($edit_result);
    $stmt->close();
} else {
    $roww = ["menu_name" => "", "menu_url" => "", "parent_id" => ""];
}

// Fetch all menu items ordered by position
$location = mysqli_query($con, "SELECT * FROM menu ORDER BY position ASC");

// Process form submission (Add or Update)
if (isset($_POST['add'])) {
    $name = $_POST['menu_name'] ?? '';
    $menu_url = $_POST['menu_url'] ?? '';
    $parent_id = isset($_POST['parent_id']) && $_POST['parent_id'] !== "NULL" ? $_POST['parent_id'] : NULL;

    if ($edit == '') {
        $stmt = $con->prepare("INSERT INTO menu(menu_name, menu_url, parent_id, position) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("ssi", $name, $menu_url, $parent_id);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Added Successfully');</script>";
    } else {
        $stmt = $con->prepare("UPDATE menu SET menu_name=?, menu_url=?, parent_id=? WHERE id=?");
        $stmt->bind_param("ssii", $name, $menu_url, $parent_id, $edit);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Updated Successfully');</script>";
    }
    echo "<script>window.location.href = 'menu.php'</script>";
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
                            <li class="breadcrumb-item active">Add Menu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Menu</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row form-material">
                                <div class="col-md-12">
                                    <h6 class="input-title mt-0">Menu Name</h6>
                                    <input type="text" name="menu_name" value="<?php echo htmlspecialchars($roww["menu_name"]); ?>" class="form-control" placeholder="Enter Menu Name">
                                    <h6 class="input-title">Menu URL</h6>
                                    <input type="text" name="menu_url" value="<?php echo htmlspecialchars($roww["menu_url"]); ?>" class="form-control" placeholder="Enter Menu URL">
                                    <h6 class="input-title">Parent Menu</h6>
                                    <select name="parent_id" class="form-control">
                                        <option value="NULL">None</option>
                                        <?php buildMenuOptions($con, $roww); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="button-items">
                                <button type="submit" name="add" class="btn btn-primary waves-effect waves-light m-20">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0" id="menu-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Parent Menu</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                while ($location_ft = mysqli_fetch_array($location)) {
                                    $parent_id = $location_ft["parent_id"];
                                    $parent_name = "NULL";
                                    
                                    if (!empty($parent_id)) {
                                        $stmt = $con->prepare("SELECT menu_name FROM menu WHERE id=?");
                                        $stmt->bind_param("i", $parent_id);
                                        $stmt->execute();
                                        $parent_result = $stmt->get_result();
                                        if ($parent_row = mysqli_fetch_assoc($parent_result)) {
                                            $parent_name = $parent_row['menu_name'];
                                        }
                                        $stmt->close();
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $index++; ?></td>
                                        <td><?php echo htmlspecialchars($location_ft["menu_name"]); ?></td>
                                        <td><?php echo htmlspecialchars($parent_name); ?></td>
                                        <td>
                                            <a href="menu.php?edit=<?php echo $location_ft["id"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-success waves-effect waves-light text-white">Edit</a>
                                        </td>
                                        <td>
                                            <a href="menu.php?delete_id=<?php echo $location_ft["id"]; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger waves-effect waves-light text-white">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './includes/footer.php';
?>
