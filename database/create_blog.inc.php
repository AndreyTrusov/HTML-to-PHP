<?php
session_start();
require_once 'connections.php';

// create_blog_tittle
// create_blog_intro_text 
// create_blog_text
// create_blog_new_category
// checkbox-Awesome_Layouts
// foreach($_POST as $key => $value){
//     echo $key . " | ";
// }

// create new category
// if ((empty($_POST['create_blog_new_category'])) ) {
//     header("location: ../create_blog.php?error=empty_category");
//     exit();
// } else {
//     if (sql_set_category($_POST["create_blog_new_category"])) {
//         header("location: ../create_blog.php");
//         exit();
//     }
// }

// create new blog
if (empty($_POST['create_blog_tittle'])) {
    header("location: ../create_blog.php?error=empty_tittle");
    exit();
}

if (empty($_POST['create_blog_intro_text'])) {
    header("location: ../create_blog.php?error=empty_intro_text");
    exit();
}

if (empty($_POST['create_blog_text'])) {
    header("location: ../create_blog.php?error=empty_text");
    exit();
}

foreach ($_POST as $key => $value) {
    $str = substr($key, 0, 9);
    $iterator = 0;

    echo $str . "+" . $iterator . " | ";
    
    if (strpos($key, "checkbox_") !== false){
        $iterator++;
    }
    
    // if($iterator == 0){
    //     header("location: ../create_blog.php?error=empty_category_checkbox|$iterator");
    //     exit();
    // }
}

echo $iterator;


?>