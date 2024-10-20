<?php
require("./connection_inc.php");
require("./function_inc.php");
require("./header.php");

$sql_product_show = "SELECT * FROM product";
$result_product_show = mysqli_query($con, $sql_product_show);

$sql_category_show = "SELECT * FROM category";
$result_category_show = mysqli_query($con, $sql_category_show);

// $sql_order_show = "SELECT * FROM orders";
// $result_order_show = mysqli_query($con, $sql_order_show);

$sql_user_show = "SELECT * FROM user";
$result_user_show = mysqli_query($con, $sql_user_show);

?>
<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Products</p>
                    <h6 class="mb-0"><?php echo mysqli_num_rows($result_product_show);?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Category</p>
                    <h6 class="mb-0"><?php echo mysqli_num_rows($result_category_show);?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Orders</p>
                    <h6 class="mb-0">bhot sare</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Users</p>
                    <h6 class="mb-0"><?php echo mysqli_num_rows($result_user_show);?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Salse & Revenue</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Sales Chart End -->

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Our Team</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">Date Join</th>
                        <th scope="col">Name</th>
                        <th scope="col">Regisnation</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10 MAR 2019</td>
                        <td>Muhammad Irshad</td>
                        <td>Booker</td>
                    </tr>
                    <tr>
                        <td>17 MAR 2019</td>
                        <td>Muhammad Zeeshan</td>
                        <td>Booker</td>
                    <tr>
                        <td>24 AUG 2019</td>
                        <td>Majid Niazi</td>
                        <td>Booker</td>
                    </tr>
                    <tr>
                        <td>10 MAR 2019</td>
                        <td>Anees Gaffer</td>
                        <td>Sales Man</td>
                    </tr>
                    <tr>
                        <td>20 APR 2019</td>
                        <td>Khalil Khan</td>
                        <td>Sales Man</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<?php
require("./footer.php");
?>