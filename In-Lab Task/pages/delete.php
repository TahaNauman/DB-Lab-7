<?php
include("../connections/connection.php");

if (isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];

    $query = $pdo->prepare("DELETE FROM employee WHERE Emp_ID = :eid");
    $query->bindParam("eid", $id);

    if ($query->execute()) {
        echo "<script>
                alert('Record deleted successfully!');
                location.assign('record.php');
              </script>";
    } else {
        echo "<script>alert('Failed to delete record!');</script>";
    }
} else {
    echo "<script>alert('Invalid Request!'); location.assign('record.php');</script>";
}
?>
