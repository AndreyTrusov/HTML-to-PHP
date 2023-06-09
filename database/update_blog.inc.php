<?php
session_start();
require_once 'connections.php';

// update blog

// check for empty input
if (empty($_POST['update_blog_tittle'])) {
    header("location: ../edit_blog.php?blog_id=" . $_GET["blog_id"] . "&status=empty_tittle");
    exit();
}

if (empty($_POST['update_blog_intro_text'])) {
    header("location: ../edit_blog.php?blog_id=" . $_GET["blog_id"] . "&status=empty_intro_text");
    exit();
}

if (empty($_POST['update_blog_text'])) {
    header("location: ../edit_blog.php?blog_id=" . $_GET["blog_id"] . "&status=empty_text");
    exit();
}

// update fields
sql_update_blog($_POST['update_blog_text'], $_POST['update_blog_intro_text'], $_POST['update_blog_tittle'], $_POST['create_blog_category'], $_GET["blog_id"]);

// go to previous page
header("location: ../edit_blog.php?blog_id=" . $_GET["blog_id"] . "&status=succeed_blog_update");
exit();
?>