<?php
session_start();
require_once 'connections.php';

// update blog

// check for empty input
if (empty($_POST['update_profile_username'])) {
    header("location: ../profile.php?status=empty_username");
    exit();
}

if (empty($_POST['update_profile_nickname'])) {
    header("location: ../profile.php?status=empty_nickname");
    exit();
}

// update profile fields
sql_update_profile($_POST['update_profile_username'], $_POST['update_profile_nickname'], $_SESSION["user_id"]);

// go to previous page
header("location: ../profile.php?status=succeed_user_update");
exit();
?>