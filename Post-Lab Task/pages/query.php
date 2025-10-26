<?php
include("../connection/connection.php");

if (isset($_POST['InsertRecord'])) {
    $Product_Name = $_POST['Name'];
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];

    $query = $pdo->prepare("INSERT INTO product (Product_Name, Category, Price, Quantity) 
                            VALUES (:nm, :ct, :pr, :qt)");
    $query->bindParam("nm", $Product_Name);
    $query->bindParam("ct", $Category);
    $query->bindParam("pr", $Price);
    $query->bindParam("qt", $Quantity);
    $query->execute();

    echo "<script>alert('Product inserted successfully!')</script>";
}

if (isset($_POST['UpdateRecord'])) {
    $id = $_POST['Product_ID'];
    $Product_Name = $_POST['Name'];
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];

    $query = $pdo->prepare("UPDATE product 
                            SET Product_Name = :nm, Category = :ct, Price = :pr, Quantity = :qt 
                            WHERE Product_ID = :pid");

    $query->bindParam("pid", $id);
    $query->bindParam("nm", $Product_Name);
    $query->bindParam("ct", $Category);
    $query->bindParam("pr", $Price);
    $query->bindParam("qt", $Quantity);
    $query->execute();

    echo "<script>
        alert('Product updated successfully!');
        location.assign('records.php');
    </script>";
}
?>
