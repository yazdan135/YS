<?php
include("./connection_inc.php");

$Id = $_GET['id'];
$sql = "delete from contact where id = $Id";
$result = mysqli_query($con, $sql);

echo "<script>
alert('Contact Deleted Successfully');
window.location.href='contact_show.php'
</script>";
