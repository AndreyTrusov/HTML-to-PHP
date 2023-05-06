<?php
session_start();
require_once 'connections.php';

// update blog

// check for empty input
if (empty($_POST['update_profile_password'])) {
    header("location: ../profile.php?status=empty_password");
    exit();
}

// update password
sql_update_password($_POST['update_profile_password'], $_SESSION["user_id"]);

// go to previous page
header("location: ../profile.php?status=succeed_password_update");
exit();
?>