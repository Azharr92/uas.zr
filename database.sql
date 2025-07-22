CREATE DATABASE IF NOT EXISTS portal_db;
USE portal_db;

CREATE TABLE senjata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_senjata VARCHAR(100) NOT NULL
);

CREATE TABLE spesifikasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senjata_id INT,
    jangkauan VARCHAR(50),
    kaliber VARCHAR(50),
    FOREIGN KEY (senjata_id) REFERENCES senjata(id)
);

CREATE TABLE operasional (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senjata_id INT,
    jumlah_terpakai INT,
    FOREIGN KEY (senjata_id) REFERENCES senjata(id)
);

INSERT INTO senjata (nama_senjata) VALUES ('SS-1'), ('AK-47');
INSERT INTO spesifikasi (senjata_id, jangkauan, kaliber) VALUES (1, '500m', '5.56mm'), (2, '300m', '7.62mm');
INSERT INTO operasional (senjata_id, jumlah_terpakai) VALUES (1, 120), (2, 90);
