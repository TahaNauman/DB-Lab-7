<?php
include("../connections/connection.php");

if (isset($_POST['InsertRecord'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Department = $_POST['Department'];
    $Designation = $_POST['Designation'];
    $Salary = $_POST['Salary'];

    $query = $pdo->prepare("INSERT INTO employee (Name, Email, Department, Designation, Salary) 
                            VALUES (:nm, :em, :dp, :dg, :sl)");
    $query->bindParam("nm", $Name);
    $query->bindParam("em", $Email);
    $query->bindParam("dp", $Department);
    $query->bindParam("dg", $Designation);
    $query->bindParam("sl", $Salary);
    $query->execute();

    echo "<script>alert('Record inserted successfully!')</script>";
}


if (isset($_POST['UpdateRecord'])) {
    $id = $_POST['Emp_ID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Department = $_POST['Department'];
    $Designation = $_POST['Designation'];
    $Salary = $_POST['Salary'];

    $query = $pdo->prepare("UPDATE employee 
                            SET Name = :nm, Email = :em, Department = :dp, Designation = :dg, Salary = :sl 
                            WHERE Emp_ID = :pid");

    $query->bindParam("pid", $id);
    $query->bindParam("nm", $Name);
    $query->bindParam("em", $Email);
    $query->bindParam("dp", $Department);
    $query->bindParam("dg", $Designation);
    $query->bindParam("sl", $Salary);
    $query->execute();

    echo "<script>
        alert('Record updated successfully!');
        location.assign('record.php');
    </script>";
}
?>
