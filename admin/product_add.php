<?php
require("./connection_inc.php");
require("./header.php");
?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add New Product</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputEmail3" class="col-form-label">Select Category:</label>
                        <select required id="inputState" name="c_id" class="form-control">
                            <?php
                            $sql = "select * from category";
                            $result = mysqli_query($con, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $rows['id'] ?>"><?php echo $rows['category'] ?></option>;
                            <?php } ?>
                        </select>

                        <label for="inputEmail3" class="col-form-label">Product Name :</label>
                        <input required type="text" name="product" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">Price :</label>
                        <input required type="text" name="price" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">MRP :</label>
                        <input required type="text" name="mrp" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">Quantity :</label>
                        <input required type="text" name="quantity" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">Paking :</label>
                        <input required type="text" name="paking" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">Product Image :</label>
                        <input required type="file" name="image" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">Status :</label>
                        <input required type="number" name="status" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">S_Desc :</label>
                        <input required type="text" name="s_desc" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">L_Desc :</label>
                        <input required type="text" name="l_desc" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">M_Title :</label>
                        <input required type="text" name="m_title" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">M_Keyword :</label>
                        <input required type="text" name="m_keyword" class="form-control" id="inputEmail3">

                        <label for="inputEmail3" class="col-form-label">M_Desc :</label>
                        <input required type="text" name="m_desc" class="form-control" id="inputEmail3">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                    <a href="./product_show.php" class="btn btn-primary">Not To Add</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $category = $_POST['c_id'];
    $product = $_POST['product'];
    $price = $_POST['price'];
    $mrp = $_POST['mrp'];
    $qty = $_POST['quantity'];
    $paking = $_POST['paking'];
    $image = $_FILES['image']['name'];
    $status = $_POST['status'];
    $s_desc = $_POST['s_desc'];
    $l_desc = $_POST['l_desc'];
    $m_title = $_POST['m_title'];
    $m_keyword = $_POST['m_keyword'];
    $m_desc = $_POST['m_desc'];

    // Allowed file types
    $allowed_file_types = ['image/jpeg', 'image/png', 'image/jpg'];
    $file_type = $_FILES['image']['type'];

    // Check if the uploaded file type is allowed
    if (!in_array($file_type, $allowed_file_types)) {
        echo "<script>
        alert('Only JPG, JPEG, and PNG formats are allowed.');
        window.location.href = 'product_add.php';
        </script>";
        exit(); // Stop further execution if the file type is not valid
    }

    // Check if product name already exists
    $check_sql = "SELECT * FROM product WHERE product_name = '$product'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>
        alert('Product name already exists. Please choose a different name.');
        window.location.href = 'product_add.php';
        </script>";
    } else {
        // Insert product if name doesn't exist
        $sql = "INSERT INTO product (category_id, product_name, price, mrp, qty, paking, image, status, s_desc, l_desc, meta_t, meta_k, meta_d) 
        VALUES ('$category', '$product', '$price', '$mrp', '$qty', '$paking' , '$image', '$status', '$s_desc', '$l_desc', '$m_title', '$m_keyword', '$m_desc')";

        $result = mysqli_query($con, $sql);

        // Move the uploaded file to the desired directory
        if (isset($_FILES)) {
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp, "img/product/" . $image);
        }

        echo "<script>
        alert('Product Added Successfully');
        window.location.href = 'product_show.php';
        </script>";
    }
}
 require("./footer.php");
?>
