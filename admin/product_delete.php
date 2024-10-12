<?php
include("./connection_inc.php");

$Id = $_GET['id'];
$sql = "delete from product where id = $Id";
$result = mysqli_query($con, $sql);

echo "<script>
alert('Product Deleted Successfully');
window.location.href='product_show.php'
</script>";
