<?php
$host = "localhost";
$db_name = "portal_db";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
} catch(PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>
