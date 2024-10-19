<?php
include("./connection_inc.php");

$Id = $_GET['id'];
$sql = "delete from news where id = $Id";
$result = mysqli_query($con, $sql);

echo "<script>
alert('News Deleted Successfully');
window.location.href='news_show.php'
</script>";
