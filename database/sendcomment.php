<?php

require_once 'connections.php';
// start session 
session_start();

// if there is a registered user - set the name for the current user
// if (isset($_SESSION["user_id"])) $_POST["name"] = $_SESSION["user_name"];

if (empty($_POST['message'])) {
    // change - if there is empty string send alert or whatever
    header("location: ../index.php?");
    exit();
}

// push comment into qsl
if(sql_push_comment($_POST['message'], $_SESSION["blog_id"], $_SESSION["user_id"])){
    // change - if there is empty string send alert or whatever
    header("location: ../post-details.php?blog=" . $_SESSION["blog_id"]);
    exit();
}else{
    // change - if there is empty string send alert or whatever
    header("location: ../index.php?commentfaild");
    exit();
}
// refresh web page


?>