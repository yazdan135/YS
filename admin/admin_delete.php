<?php
include("./connection_inc.php");

$Id = $_GET['id'];
$sql = "delete from admin_user where id = $Id";
$result = mysqli_query($con, $sql);

echo "<script>
alert('Admin Deleted Successfully');
window.location.href='admin_show.php'
</script>";
