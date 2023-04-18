<?php
// if user just accidentally got on the page - return him on signup page
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $nickname = $_POST["nickname"];
    $password_post = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    require_once 'connections.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name, $nickname, $password_post , $passwordrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($name) !== false) {
        header("location: ../signup.php?error=invalidname");
        exit();
    }

    if (invalidNickname($nickname) !== false) {
        header("location: ../signup.php?error=invalidnickname");
        exit();
    }

    if (passwordMatch($password_post , $passwordrepeat) !== false) {
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }

    if (userExists($name) !== false) {
        header("location: ../signup.php?error=usertaken");
        exit();
    }

    if (nicknameExists($nickname) !== false) {
        header("location: ../signup.php?error=nicknametaken");
        exit();
    }

    createUser($name, $nickname, $password_post);
    header("location: ../login.php");

} else {
    header("location: ../signup.php");
    exit();
}

?>