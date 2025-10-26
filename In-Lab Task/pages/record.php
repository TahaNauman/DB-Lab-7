<?php
include('query.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Employee Records</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container mt-4">
      <h1 class="text-center mb-4">Employee Records</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">Emp ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Department</th>
              <th scope="col">Designation</th>
              <th scope="col">Salary</th>
              <th scope="col" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = $pdo->query("SELECT employee.*, department.Dept_Name 
                                    FROM employee 
                                    INNER JOIN department 
                                    ON employee.Department = department.Dept_ID;");
              $result = $query->fetchAll(PDO::FETCH_ASSOC);

              foreach($result as $emp) {
            ?>
            <tr>
              <td><?php echo $emp['Emp_ID']; ?></td>
              <td><?php echo $emp['Name']; ?></td>
              <td><?php echo $emp['Email']; ?></td>
              <td><?php echo $emp['Dept_Name']; ?></td>
              <td><?php echo $emp['Designation']; ?></td>
              <td><?php echo $emp['Salary']; ?></td>
              <td><a href="update.php?emp_id=<?php echo $emp['Emp_ID']; ?>" class="btn btn-success btn-sm">Edit</a></td>
              <td><a href="delete.php?emp_id=<?php echo $emp['Emp_ID']; ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this record?');">Delete</a></td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
