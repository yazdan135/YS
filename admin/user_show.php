<?php
require("./connection_inc.php");
require("./header.php");
$sql = "select * from user order by id desc";
$res = mysqli_query($con, $sql);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Users</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th style="color:white;" scope="col">ID</th>
                                <th style="color:white;" scope="col">Name</th>
                                <th style="color:white;" scope="col">Email</th>
                                <th style="color:white;" scope="col">Password</th>
                                <th style="color:white;" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                while ($rows = mysqli_fetch_assoc($res)) {
                                ?>
                                    <th style="color:white;"><?php echo $rows['id'] ?></th>
                                    <td style="color:white;"><?php echo $rows['name'] ?></td>
                                    <td style="color:white;"><?php echo $rows['email'] ?></td>
                                    <td style="color:white;"><?php echo $rows['password'] ?></td>
                                    <td>
                                        <a href="./user_ban.php?id=<?php echo $rows['id']; ?>" class="btn btn-light px-3">
                                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                            <lord-icon
                                                src="https://cdn.lordicon.com/wghpqwxd.json"
                                                trigger="hover"
                                                stroke="bold"
                                                colors="primary:#ffffff,secondary:#ffffff"
                                                style="width:30px;height:30px">
                                            </lord-icon>
                                        </a>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php
require("./footer.php");
?>