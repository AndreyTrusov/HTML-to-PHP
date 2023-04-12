<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'tcphp';

try {
    $connection = new PDO("mysql:host=$servername; dbname=$databaseName", $username, $password);
    echo "Connection successfully";

} catch (PDOException $exception) {
    echo "Connection failed: " . $exception->getMessage();
}

$stmt = $connection->query("SELECT * FROM menu");
while ($row = $stmt->fetch()) {
    echo $row['user_name'];
}

?>