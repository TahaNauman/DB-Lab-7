<?php
include("../connections/connection.php");
include("query.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Employee Entry Form</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
      <h1 class="mx-auto text-capitalize">Employee Entry Form</h1>
      <form action="" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Name</label>
          <input
            type="text"
            class="form-control"
            name="Name"
            placeholder=""
            required
          />
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            name="Email"
            placeholder=""
            required
          />
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Department</label>
          <select class="form-select form-select-lg" name="Department" required>
            <option selected>Select one</option>
            <?php
              $query = $pdo->query("SELECT * FROM department");
              $data = $query->fetchAll(PDO::FETCH_ASSOC);
              foreach ($data as $department) {
            ?>
              <option value="<?php echo $department['Dept_ID'] ?>">
                <?php echo $department['Dept_Name'] ?>
              </option>
            <?php
              }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Designation</label>
          <input
            type="text"
            class="form-control"
            name="Designation"
            placeholder=""
            required
          />
        </div>

        <div class="mb-3">
          <label for="" class="form-label">Salary</label>
          <input
            type="number"
            class="form-control"
            name="Salary"
            placeholder=""
            required
          />
        </div>

        <button
          type="submit"
          class="btn btn-outline-primary"
          name="InsertRecord"
        >
          Submit
        </button>
      </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
