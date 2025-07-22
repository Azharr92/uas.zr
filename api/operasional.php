<?php
include_once '../config/database.php';

$query = $conn->prepare("SELECT * FROM operasional");
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
