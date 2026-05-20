<?php
include './includes/conn.php';

if (isset($_POST['order'])) {
    $order = explode(",", $_POST['order']);
    foreach ($order as $position => $id) {
        $id = str_replace("menu_", "", $id);
        $sql = "UPDATE menu SET position = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $position, $id);
        $stmt->execute();
    }
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
