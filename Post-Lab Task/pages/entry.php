<?php
include("../connection/connection.php");
include("query.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Product Entry Form</title>
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
      <h1 class="mx-auto text-capitalize">Product Entry Form</h1>
      <form action="" method="post">
        <div class="mb-3">
          <label class="form-label">Product Name</label>
          <input
            type="text"
            class="form-control"
            name="Name"
            required
          />
        </div>

        <div class="mb-3">
          <label class="form-label">Category</label>
          <select class="form-select form-select-lg" name="Category" required>
            <option selected>Select one</option>
            <?php
              $query = $pdo->query("SELECT * FROM category");
              $data = $query->fetchAll(PDO::FETCH_ASSOC);
              foreach ($data as $category) {
            ?>
              <option value="<?php echo $category['Category_ID'] ?>">
                <?php echo $category['Category_Name'] ?>
              </option>
            <?php
              }
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Price</label>
          <input
            type="number"
            class="form-control"
            name="Price"
            min="0"
            step="0.01"
            required
          />
        </div>

        <div class="mb-3">
          <label class="form-label">Quantity</label>
          <input
            type="number"
            class="form-control"
            name="Quantity"
            min="0"
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
