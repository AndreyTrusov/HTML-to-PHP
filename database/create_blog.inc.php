<?php
session_start();
require_once 'connections.php';

// create new blog
if (empty($_POST['create_blog_tittle'])) {
    header("location: ../create_blog.php?status=empty_tittle");
    exit();
}

if (empty($_POST['create_blog_intro_text'])) {
    header("location: ../create_blog.php?status=empty_intro_text");
    exit();
}

if (empty($_POST['create_blog_text'])) {
    header("location: ../create_blog.php?status=empty_text");
    exit();
}

foreach ($_POST as $key => $value) {
    echo $key . " + " . $value . "//";
}

// send blog info to db
sql_create_blog($_POST['create_blog_tittle'], $_POST['create_blog_intro_text'], $_POST['create_blog_text'], $_POST['create_blog_category'], $_SESSION["user_id"]);

// go to post menu page
header("location: ../create_blog.php?status=succeed_blog_created");
exit();

?>