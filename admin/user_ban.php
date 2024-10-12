<?php 
require("./connection_inc.php");
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid User ID.'); window.location.href = 'user_show.php';</script>";
    exit();
}

$Id = intval($_GET['id']);

$sql_get_user = "SELECT * FROM user WHERE id = $Id";
$result_get_user = mysqli_query($con, $sql_get_user);

if (!$result_get_user) {
    echo "<script>alert('Error fetching user details.'); window.location.href = 'user_show.php';</script>";
    exit();
}

$result_get_user = mysqli_fetch_assoc($result_get_user);

if (!$result_get_user) {
    echo "<script>alert('User not found.'); window.location.href = 'user_show.php';</script>";
    exit();
}

// Insert into banned users
$sql_ban_user = "INSERT INTO baned_user (name, email, password) VALUES ('" . $result_get_user['name'] . "', '" . $result_get_user['email'] . "', '" . $result_get_user['password'] . "')";
$result_ban_user = mysqli_query($con, $sql_ban_user);
if (!$result_ban_user) {
    echo "<script>alert('Error banning the user.'); window.location.href = 'user_show.php';</script>";
    exit();
}

// Delete from user table
$sql = "DELETE FROM user WHERE id = $Id";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "<script>alert('Error deleting the user.'); window.location.href = 'user_show.php';</script>";
    exit();
}

// Redirect on success
echo "<script>alert('User banned and deleted successfully.'); window.location.href = 'user_show.php';</script>";
?>
