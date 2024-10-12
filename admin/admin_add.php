<?php
require("./connection_inc.php");
require("./header.php");
?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <div class="col-xl-8">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add New Admin</h6>
                <form method="post">
                    <div class="mb-3">
                        <label for="adminName" class="form-label">Admin Name</label>
                        <input type="text" class="form-control" required id="adminName" placeholder="Enter Admin Name" name="admin">
                    </div>
                    <div class="mb-3">
                        <label for="adminPassword" class="form-label">Admin Password</label>
                        <input type="password" class="form-control" required id="adminPassword" placeholder="Enter Admin Password" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
                    <a href="./admin_show.php" class="btn btn-primary">Not To Add</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php

if (isset($_POST['submit'])) {
    $admin  = $_POST['admin'];
    $password  = $_POST['password'];

    // Check if the admin name already exists
    $checkSql = "SELECT * FROM admin_user WHERE name = '$admin'";
    $checkResult = mysqli_query($con, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Admin already exists
        echo "<script>
        alert('Admin already exists.');
        window.location.href='admin_show.php';
        </script>";
    } else {
        // Insert the new admin
        $sql = "INSERT INTO admin_user (name, password) VALUES ('$admin', '$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>
            alert('Admin Added Successfully');
            window.location.href='admin_show.php';
            </script>";
        } else {
            echo "<script>
            alert('Error adding admin.');
            window.location.href='admin_add.php';
            </script>";
        }
    }
}

require("./footer.php");
?>