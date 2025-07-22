<?php
include_once '../config/database.php';
header('Content-Type: application/json');

// Method GET: Ambil semua data senjata
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = $conn->prepare("SELECT * FROM senjata");
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['success' => true, 'data' => $data]);
    exit;
}

// Method POST: Tambah data senjata
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("INSERT INTO senjata (nama_senjata, jenis, negara_asal, tahun_produksi, status_aktif) VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([
        $input['nama_senjata'],
        $input['jenis'],
        $input['negara_asal'],
        $input['tahun_produksi'],
        $input['status_aktif'] ? 1 : 0
    ]);

    echo json_encode(['success' => $result, 'message' => $result ? 'Data berhasil ditambahkan' : 'Gagal menambahkan data']);
    exit;
}

// Method PUT: Edit data senjata
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $input = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("UPDATE senjata SET nama_senjata = ?, jenis = ?, negara_asal = ?, tahun_produksi = ?, status_aktif = ? WHERE id = ?");
    $result = $stmt->execute([
        $input['nama_senjata'],
        $input['jenis'],
        $input['negara_asal'],
        $input['tahun_produksi'],
        $input['status_aktif'] ? 1 : 0,
        $input['id']
    ]);

    echo json_encode(['success' => $result, 'message' => $result ? 'Data berhasil diubah' : 'Gagal mengubah data']);
    exit;
}

// Method DELETE: Hapus data senjata
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $input = json_decode(file_get_contents("php://input"), true);

    $stmt = $conn->prepare("DELETE FROM senjata WHERE id = ?");
    $result = $stmt->execute([$input['id']]);

    echo json_encode(['success' => $result, 'message' => $result ? 'Data berhasil dihapus' : 'Gagal menghapus data']);
    exit;
}

// Jika method tidak didukung
echo json_encode(['success' => false, 'message' => 'Metode tidak diizinkan']);
http_response_code(405);
