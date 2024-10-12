<?php
require("./connection_inc.php");
require("./header.php");
$sql = "SELECT * FROM contact ORDER BY id DESC";
$res = mysqli_query($con, $sql);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h3 class="text-center text-white">Contacts</h3><br><br>
                <div class="table-responsive">
                    <table class="table table-bordered border-light">
                        <thead>
                            <tr>
                                <th style="color:white;" scope="col">ID</th>
                                <th style="color:white;" scope="col">Name</th>
                                <th style="color:white;" scope="col">Email</th>
                                <th style="color:white;" scope="col">Phone</th>
                                <th style="color:white;" scope="col">Message</th>
                                <th style="color:white;" scope="col">Date</th>
                                <th style="color:white;" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th style="color:white;"><?php echo $rows['id']; ?></th>
                                    <td style="color:white;"><?php echo $rows['name']; ?></td>
                                    <td style="color:white;"><?php echo $rows['email']; ?></td>
                                    <td style="color:white;"><?php echo $rows['mobile']; ?></td>
                                    <td style="color:white;"><?php echo $rows['comment']; ?></td>
                                    <td style="color:white;"><?php echo $rows['added_on']; ?></td>
                                    <td style="color:white;">
                                        <a href="contact_delet.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger">
                                           Delete
                            </a>
                                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $rows['email']; ?>&cc=yourcc@example.com&su=Regarding%20Your%20Inquiry&body=Hello%20<?php echo urlencode($rows['name']); ?>,%0D%0A" target="_blank" class="btn btn-warning">Mail </a>
                                        <a href="https://wa.me/<?php echo $rows['mobile']; ?>" target="_blank" class="btn btn-success"> Chat </a>
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

<?php
require("./footer.php");
?>