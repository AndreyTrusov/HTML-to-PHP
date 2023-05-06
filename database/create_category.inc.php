<?php
session_start();
require_once 'connections.php';

// create new category

// check for empty input
if (empty($_POST['create_blog_new_category'])) {
    header("location: ../create_blog.php?status=empty_category");
    exit();
}

// update fields
sql_set_category($_POST['create_blog_new_category']);

// go to previous page
header("location: ../create_blog.php?status=succeed_category_created");
exit();
?>