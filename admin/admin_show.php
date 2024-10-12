<?php
require("./connection_inc.php");
require("./header.php");
$sql = "select * from admin_user";
$res = mysqli_query($con, $sql);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Admins</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th style="color:white;" scope="col">ID</th>
                                <th style="color:white;" scope="col">Name</th>
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
                                    <td style="color:white;"><?php echo $rows['password'] ?></td>
                                    <td style="color:white;">
                                        <a href="admin_delete.php?id=<?php echo $rows['id'] ?>">
                                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                            <lord-icon
                                                src="https://cdn.lordicon.com/hwjcdycb.json"
                                                trigger="hover"
                                                colors="primary:#ffffff,secondary:#ffffff"
                                                style="width:30px;height:40px">
                                            </lord-icon>
                                    </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="./admin_add.php">
                        <script src="https://cdn.lordicon.com/lordicon.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/sbnjyzil.json"
                            trigger="hover"
                            colors="primary:#ffffff,secondary:#ffffff"
                            style="width:70px;height:60px">
                        </lord-icon>
                    </a>
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