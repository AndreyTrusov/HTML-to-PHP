<?php
// if user just accidentally got on the page - return him on signup page
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $nickname = $_POST["nickname"];
    $password_post = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    require_once 'connections.php';
    require_once 'functions.inc.php';

    //check for empty or valid imputs
    if (emptyInputSignup($name, $nickname, $password_post , $passwordrepeat)) {
        header("location: ../signup.php?error=empty_input");
        exit();
    }

    if (invalidUid($name)) {
        header("location: ../signup.php?error=invalidname");
        exit();
    }

    if (invalidNickname($nickname)) {
        header("location: ../signup.php?error=invalidnickname");
        exit();
    }

    if (passwordMatch($password_post , $passwordrepeat)) {
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }

    if (userExists($name)) {
        header("location: ../signup.php?error=usertaken");
        exit();
    }

    if (nicknameExists($nickname)) {
        header("location: ../signup.php?error=nicknametaken");
        exit();
    }

    // if every fields is OK --> create new user and go to login page
    createUser($name, $nickname, $password_post);
    header("location: ../login.php");

} else {
    header("location: ../signup.php");
    exit();
}

?>