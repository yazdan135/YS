<?php 
require("./connection_inc.php");

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid User ID.'); window.location.href = 'userban_show.php';</script>";
    exit();
}

$Id = intval($_GET['id']);

$sql_get_banned_user = "SELECT * FROM baned_user WHERE id = $Id";
$result_get_banned_user = mysqli_query($con, $sql_get_banned_user);

if (!$result_get_banned_user) {
    echo "<script>alert('Error fetching banned user details.'); window.location.href = 'userban_show.php';</script>";
    exit();
}

$result_get_banned_user = mysqli_fetch_assoc($result_get_banned_user);

if (!$result_get_banned_user) {
    echo "<script>alert('Banned user not found.'); window.location.href = 'userban_show.php';</script>";
    exit();
}

// Insert back to user table
$sql_unban_user = "INSERT INTO user (name, email, password) VALUES ('" . $result_get_banned_user['name'] . "', '" . $result_get_banned_user['email'] . "', '" . $result_get_banned_user['password'] . "')";
$result_unban_user = mysqli_query($con, $sql_unban_user);
if (!$result_unban_user) {
    echo "<script>alert('Error unbanning the user.'); window.location.href = 'userban_show.php';</script>";
    exit();
}

// Delete from banned users table
$sql = "DELETE FROM baned_user WHERE id = $Id";
$result = mysqli_query($con, $sql);
if (!$result) {
    echo "<script>alert('Error deleting the banned user record.'); window.location.href = 'userban_show.php';</script>";
    exit();
}

// Redirect on success
echo "<script>alert('User unbanned successfully.'); window.location.href = 'userban_show.php';</script>";
?>
