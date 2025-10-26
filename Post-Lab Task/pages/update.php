<?php
include("query.php");

if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];

    $query = $pdo->prepare("SELECT * FROM product WHERE Product_ID = :product_id");
    $query->bindParam(":product_id", $id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Update Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center mb-4">Update Product Record</h2>

    <form action="" method="post">
        <input type="hidden" name="Product_ID" value="<?php echo $row['Product_ID']; ?>">

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="Name" class="form-control" value="<?php echo $row['Product_Name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" name="Category" required>
                <option disabled>Select Category</option>
                <?php
                $cat_query = $pdo->query("SELECT * FROM category");
                $categories = $cat_query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $cat) {
                    $selected = ($row['Category'] == $cat['Category_ID']) ? 'selected' : '';
                    echo "<option value='{$cat['Category_ID']}' $selected>{$cat['Category_Name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="Price" class="form-control" value="<?php echo $row['Price']; ?>" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="Quantity" class="form-control" value="<?php echo $row['Quantity']; ?>" min="0" required>
        </div>

        <button type="submit" name="UpdateRecord" class="btn btn-primary w-100">Update Product</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
