<?php
require("./connection_inc.php");
require("./header.php");
$Id = $_GET['id'];

// Fetch product details
$sql = "SELECT * FROM product WHERE id = $Id";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_assoc($result);
} else {
    echo "Product not found or invalid query.";
    exit;
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Update Product</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputState" class="col-form-label">Select Category:</label>
                        <select required id="inputState" name="c_id" class="form-control">
                            <?php
                            $sql = "SELECT * FROM category";
                            $result = mysqli_query($con, $sql);
                            while ($category = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $rows['category_id']) ? 'selected' : ''; ?>>
                                    <?php echo $category['category']; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <label for="product" class="col-form-label">Product Name :</label>
                        <input required value="<?php echo $rows['product_name']; ?>" type="text" name="product" class="form-control" id="product">

                        <label for="price" class="col-form-label">Price :</label>
                        <input required value="<?php echo $rows['price']; ?>" type="text" name="price" class="form-control" id="price">

                        <label for="mrp" class="col-form-label">MRP :</label>
                        <input required value="<?php echo $rows['mrp']; ?>" type="text" name="mrp" class="form-control" id="mrp">

                        <label for="quantity" class="col-form-label">Quantity :</label>
                        <input required value="<?php echo $rows['qty']; ?>" type="text" name="quantity" class="form-control" id="quantity">

                        <label for="quantity" class="col-form-label">Paking :</label>
                        <input required value="<?php echo $rows['paking']; ?>" type="text" name="paking" class="form-control" id="quantity">

                        <label for="image" class="col-form-label">Product Image :</label>
                        <input type="file" name="image" class="form-control" id="image">

                        <label for="status" class="col-form-label">Status :</label>
                        <input required value="<?php echo $rows['status']; ?>" type="number" name="status" class="form-control" id="status">

                        <label for="s_desc" class="col-form-label">S_Desc :</label>
                        <input required value="<?php echo $rows['s_desc']; ?>" type="text" name="s_desc" class="form-control" id="s_desc">

                        <label for="l_desc" class="col-form-label">L_Desc :</label>
                        <input required value="<?php echo $rows['l_desc']; ?>" type="text" name="l_desc" class="form-control" id="l_desc">

                        <label for="m_title" class="col-form-label">M_Title :</label>
                        <input required value="<?php echo $rows['meta_t']; ?>" type="text" name="m_title" class="form-control" id="m_title">

                        <label for="m_keyword" class="col-form-label">M_Keyword :</label>
                        <input required value="<?php echo $rows['meta_k']; ?>" type="text" name="m_keyword" class="form-control" id="m_keyword">

                        <label for="m_desc" class="col-form-label">M_Desc :</label>
                        <input required value="<?php echo $rows['meta_d']; ?>" type="text" name="m_desc" class="form-control" id="m_desc">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                    <a href="./product_show.php" class="btn btn-primary">Not To Update</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['update'])) {
    $category = $_POST['c_id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $qty = $_POST['quantity'];
    $paking = $_POST['paking'];
    $status = $_POST['status'];
    $s_desc = $_POST['s_desc'];
    $l_desc = $_POST['l_desc'];
    $m_title = $_POST['m_title'];
    $m_keyword = $_POST['m_keyword'];
    $m_desc = $_POST['m_desc'];

    // Image Handling
    $image = $_FILES['image']['name'];
    $file_type = $_FILES['image']['type'];
    $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg'];

    // Check if the uploaded file type is allowed
    if (!empty($image) && !in_array($file_type, $allowed_file_types)) {
        echo "<script>alert('Only JPG, JPEG, and PNG formats are allowed.'); window.location.href = 'product_update.php?id=$Id';</script>";
        exit();
    }

    // Check if product name already exists but excluding the current product
    $check_sql = "SELECT * FROM product WHERE product_name = '$product' AND id != $Id";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Product name already exists. Please choose a different name.'); window.location.href = 'product_update.php?id=$Id';</script>";
    } else {
        // Prepare the update query
        $sql = "UPDATE product SET category_id = '$category', product_name = '$product', price = '$price', mrp = '$mrp',
                qty = '$qty', paking = '$paking', status = '$status', s_desc = '$s_desc', l_desc = '$l_desc',
                meta_t = '$m_title', meta_k = '$m_keyword', meta_d = '$m_desc' WHERE id = $Id";

        // Include image in update if a new one is provided
        if (!empty($image)) {
            $sql = "UPDATE product SET category_id = '$category', product_name = '$product', price = '$price', mrp = '$mrp',
                    qty = '$qty', paking = '$paking', image = '$image', status = '$status', s_desc = '$s_desc', l_desc = '$l_desc',
                    meta_t = '$m_title', meta_k = '$m_keyword', meta_d = '$m_desc' WHERE id = $Id";
            // Move uploaded file
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp, "img/product/" . $image);
        }

        // Execute the update query
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Product Updated Successfully'); window.location.href='product_show.php';</script>";
        } else {
            echo "<script>alert('Error updating product: " . mysqli_error($con) . "');</script>";
        }
    }
}

require("./footer.php");
?>
