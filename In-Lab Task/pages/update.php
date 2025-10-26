<?php
include("query.php");

if (isset($_GET['emp_id'])) {
    $id = $_GET['emp_id'];

    $query = $pdo->prepare("SELECT * FROM employee WHERE Emp_ID = :emp_id");
    $query->bindParam(":emp_id", $id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Update Employee Record</h2>

    <form action="" method="post">
        <input type="hidden" name="Emp_ID" value="<?php echo $row['Emp_ID']; ?>">

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="Name" class="form-control" value="<?php echo $row['Name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="Email" class="form-control" value="<?php echo $row['Email']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Department</label>
            <select class="form-select" name="Department" required>
                <option disabled>Select Department</option>
                <?php
                $dept_query = $pdo->query("SELECT * FROM department");
                $departments = $dept_query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($departments as $dept) {
                    $selected = ($row['Department'] == $dept['Dept_ID']) ? 'selected' : '';
                    echo "<option value='{$dept['Dept_ID']}' $selected>{$dept['Dept_Name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Designation</label>
            <input type="text" name="Designation" class="form-control" value="<?php echo $row['Designation']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Salary</label>
            <input type="number" name="Salary" class="form-control" value="<?php echo $row['Salary']; ?>" required>
        </div>

        <button type="submit" name="UpdateRecord" class="btn btn-primary w-100">Update Employee</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
