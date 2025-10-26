<?php
include("../connection/connection.php");

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    $query = $pdo->prepare("DELETE FROM product WHERE Product_ID = :pid");
    $query->bindParam(":pid", $id);

    if ($query->execute()) {
        echo "<script>
                alert('Product deleted successfully!');
                location.assign('records.php');
              </script>";
    } else {
        echo "<script>alert('Failed to delete product!');</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); location.assign('records.php');</script>";
}
?>
