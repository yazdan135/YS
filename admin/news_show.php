<?php
require("./connection_inc.php");
require("./function_inc.php");
require("./header.php");
$sql = "select * from allnews";
$res = mysqli_query($con, $sql);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Our News Letter</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th style="color:white;" scope="col">ID</th>
                                <th style="color:white;" scope="col">Name</th>
                                <th style="color:white;" scope="col">Email</th>
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



                                    <td style="color:white;">
                                        <a href="news_delete.php?id=<?php echo $rows['id'] ?>" class="btn btn-danger">Delete</a>
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $rows['email']; ?>&cc=yourcc@example.com&su=Regarding%20Your%20Inquiry&body=Hello%20<?php echo urlencode($rows['name']); ?>,%0D%0A" target="_blank" class="btn btn-warning">Mail </a>
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