<?php
require("./connection_inc.php");
require("./header.php");
?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add New Category</h6>
                <form method="post">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" required id="categoryName" placeholder="Enter Category Name" name="category">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
                    <a href="./category_show.php" class="btn btn-primary">Not To Add</a>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php
if (isset($_POST['submit'])) {
    $category = $_POST['category'];

    // Check if the category already exists
    $checkSql = "SELECT * FROM category WHERE category = '$category'";
    $checkResult = mysqli_query($con, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Category already exists
        echo "<script>
        alert('Category already exists.');
        window.location.href='category_add.php';
        </script>";
    } else {
        // Insert the new category
        $sql = "INSERT INTO category (category) VALUES ('$category')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>
            alert('Category Added Successfully');
            window.location.href='category_show.php';
            </script>";
        } else {
            echo "<script>
            alert('Error adding category.');
            window.location.href='category_show.php';
            </script>";
        }
    }
}

require("./footer.php");
?>