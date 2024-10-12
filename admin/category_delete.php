<?php
include("./connection_inc.php");

$Id = $_GET['id'];
$sql = "delete from category where id = $Id";
$result = mysqli_query($con, $sql);

echo "<script>
alert('Category Deleted Successfully');
window.location.href='category_show.php'
</script>";
