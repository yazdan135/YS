<?php
require("./connection_inc.php");
require("./header.php");

$Id = $_GET['id'];
$sql = "SELECT * FROM category WHERE id = $Id";
$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_assoc($result);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Update Category</h6>
                <form method="post">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" required value="<?php echo $rows['category']; ?>" id="categoryName" placeholder="Enter Category Name" name="category">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                    <a href="./category_show.php" class="btn btn-primary">Not To Update </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php

if (isset($_POST['update'])) {
    $category = $_POST['category'];

    // Check if the new category name already exists
    $checkSql = "SELECT * FROM category WHERE category = '$category' AND id != $Id";
    $checkResult = mysqli_query($con, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Category name already exists
        echo "<script>
        alert('Category name already exists. Please choose a different name.');
        window.location.href='category_add.php';
        </script>";
    } else {
        // Update the category
        $sql = "UPDATE category SET category = '$category' WHERE id = $Id";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>
            alert('Category Updated Successfully');
            window.location.href='category_show.php';
            </script>";
        } else {
            echo "<script>
            alert('Error updating category.');
            window.location.href='category_show.php';
            </script>";
        }
    }
}

include("./footer.php");
?>