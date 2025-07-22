<?php
include_once '../config/database.php';

$query = $conn->prepare("
    SELECT s.nama_senjata, sp.jangkauan, op.jumlah_terpakai
    FROM senjata s
    JOIN spesifikasi sp ON s.id = sp.senjata_id
    JOIN operasional op ON s.id = op.senjata_id
");
$query->execute();
$data = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
