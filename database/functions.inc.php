<?php
require_once 'connections.php';
// cheks if there is empty imputs on signup page
function emptyInputSignup($name, $nickname, $password_post, $passwordrepeat)
{
    if (empty($name) || empty($nickname) || empty($password_post) || empty($passwordrepeat)) {
        return true;
    }
    return false;
}

function emptyInputLogin($nickname, $password_post)
{
    if (empty($nickname) || empty($password_post)) {
        return true;
    }
    return false;
}

function invalidUid($name)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        return true;
    }
    return false;
}

function invalidNickname($nickname)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $nickname)) {
        return true;
    }
    return false;
}

function passwordMatch($password, $passwordrepeat)
{
    if ($password !== $passwordrepeat) {
        return true;
    }
    return false;
}

function userExists($name)
{
    $request = "SELECT * FROM ablog_db.user WHERE user_name = '$name';";
    global $connection;
    try {
        global $connection;
        $r_name = $connection->query($request);
        foreach ($r_name as $t_n) {
            if (isset($t_n))
                $name_return = $t_n["user_name"];
        }
    } catch (Exception $e) {
        header("location: ../signup.php?error=stmtfailed_userExists");
        exit();
    }
    if (isset($name_return)) {
        if ($name == $name_return) {
            return true;
        }
    } else {
        return false;
    }
}

function nicknameExists($nickname)
{
    $request = "SELECT * FROM ablog_db.user WHERE nickname = '$nickname';";
    global $connection;
    try {
        global $connection;
        $r_name = $connection->query($request);
        foreach ($r_name as $t_n) {
            if (isset($t_n))
                $name_return = $t_n["name"];
        }
    } catch (Exception $e) {
        header("location: ../signup.php?error=stmtfailed_nickexists");
        exit();
    }
    if (isset($name_return)) {
        if ($nickname == $name_return) {
            return true;
        }
    } else {
        return false;
    }
}

function createUser($name, $nickname, $password)
{
    $hashedPws = password_hash($password, PASSWORD_DEFAULT);
    $request = "INSERT INTO `user` (`id`, `user_name`, `nickname`, `heslo`) VALUES (NULL, '$name', '$nickname', '$hashedPws');";
    global $connection;
    try {
        global $connection;
        $connection->query($request);
    } catch (Exception $e) {
        header("location: ../login.php?error=stmtfailed_createUser" . $e->getMessage());
        exit();
    }
}

// log in user into system function
function loginUser($nickname, $password_post)
{
    $user_Id = "1";
    $check_Password = false;
    $request = "SELECT id, user_name, nickname, heslo FROM ablog_db.user WHERE nickname = '$nickname';";
    global $connection;
    try {
        global $connection;
        $users = $connection->query($request);
        foreach ($users as $user) {
            $user_Id = $user["id"];
            $user_Name = $user["user_name"];
            $check_Password = password_verify($password_post, $user["heslo"]);
            $sql_nickname = $user["nickname"];
        }
    } catch (Exception $e) {
        header("location: ../login.php?error=stmtfailed_createUser" . $e->getMessage());
        exit();
    }
    if ($nickname !== $sql_nickname) {
        header("location: ../login.php?error=wrong_nickname");
        exit();
    }
    if ($check_Password === false) {
        header("location: ../login.php?error=wrong_password");
        exit();
    } else if ($check_Password === true) { // if every thing is okey --> start session 
        if(session_status() !== PHP_SESSION_ACTIVE) session_start();
        $_SESSION["user_id"] = $user_Id;
        $_SESSION["user_name"] = $user_Name;
        $_SESSION["user_nickname"] = $sql_nickname;
        header("location: ../index.php?");
        exit();
    }
}

?>