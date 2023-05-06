<?php
// if user just accidentally got on the page - return him on login page
if (isset($_POST["submit"])) {
    $nickname = $_POST["nickname"];
    $password_post = $_POST["password"];

    require_once 'connections.php';
    require_once 'functions.inc.php';

    //check for empty or valid imputs
    if (emptyInputLogin($nickname, $password_post)) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    // if every fields is OK --> log in user and go to main page
    loginUser($nickname, $password_post);

} else {
    header("location: ../login.php");
    exit();
}

?>