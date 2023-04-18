<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'ablog_db';

try {
    $connection = new PDO("mysql:host=$servername; dbname=$databaseName", $username, $password);
} catch (PDOException $exception) {
    echo "Connection to sql failed: " . $exception->getMessage();
}

if (empty($_POST['name']))
    exit("name is empty");
if (empty($_POST['email']))
    exit("email is empty");
if (empty($_POST['subject']))
    exit("subject is empty");
if (empty($_POST['message']))
    exit("message is empty");


?>