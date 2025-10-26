<?php
include('query.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Product Records</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container mt-4">
      <h1 class="text-center mb-4">Product Records</h1>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="table-dark">
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col" colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $query = $pdo->query("SELECT product.*, category.Category_Name 
                                    FROM product 
                                    INNER JOIN category 
                                    ON product.Category = category.Category_ID
                                    ORDER BY product.Product_ID ASC;");
              $result = $query->fetchAll(PDO::FETCH_ASSOC);

              foreach($result as $prod) {
            ?>
            <tr>
              <td><?php echo $prod['Product_ID']; ?></td>
              <td><?php echo $prod['Product_Name']; ?></td>
              <td><?php echo $prod['Category_Name']; ?></td>
              <td><?php echo $prod['Price']; ?></td>
              <td><?php echo $prod['Quantity']; ?><?php if ($prod['Quantity'] < 10) echo " (Low Stock)"; ?></td>
              <td><a href="update.php?product_id=<?php echo $prod['Product_ID']; ?>" class="btn btn-success btn-sm">Edit</a></td>
              <td><a href="delete.php?product_id=<?php echo $prod['Product_ID']; ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this product?');">Delete</a></td>
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
