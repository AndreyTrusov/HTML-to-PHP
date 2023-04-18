<?php
// if user just accidentally got on the page - return him on login page
if (isset($_POST["submit"])) {
    $nickname = $_POST["nickname"];
    $password_post = $_POST["password"];

    require_once 'connections.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($nickname, $password_post) === true) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    if (invalidNickname($nickname) !== false) {
        header("location: ../login.php?error=invalidnickname");
        exit();
    }

    loginUser($nickname, $password_post);

} else {
    header("location: ../login.php");
    exit();
}

?>