<?php

require_once 'connections.php';
session_start();

if (empty($_POST['commnet_text'])) {
    header("location: ../post-details.php?status=commnet_has_no_text");
    exit();
}

// push comment into qsl
if (sql_push_comment($_POST['commnet_text'], $_SESSION["blog_id"], $_SESSION["user_id"])) {
    // change - if there is empty string send alert or whatever
    header("location: ../post-details.php?blog=" . $_SESSION["blog_id"] . "&status=commnet_succeed");
    exit();
} else {
    // change - if there is empty string send alert or whatever
    header("location: ../post-details.php?status=sql_comment_faild");
    exit();
}
?>