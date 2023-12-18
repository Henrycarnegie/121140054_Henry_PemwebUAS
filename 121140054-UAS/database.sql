-- Active: 1682758151526@@127.0.0.1@3306@uas_henry
CREATE TABLE motor (
    motor_id INT PRIMARY KEY,
    merk VARCHAR(255),
    tipe VARCHAR(255),
    tahun_produksi INT,
    warna VARCHAR(50),
    harga_sewa_per_hari DECIMAL(10, 2),
    status VARCHAR(50)
);

-- Contoh data awal untuk tabel motor
INSERT INTO motor VALUES
    (1, 'Yamaha', 'NMAX', 2022, 'Hitam', 150000.00, 'Tersedia'),
    (2, 'Honda', 'Vario', 2021, 'Merah', 120000.00, 'Tersedia'),
    (3, 'Suzuki', 'Address', 2020, 'Putih', 130000.00, 'Disewa'),
    (4, 'Kawasaki', 'Ninja 250R', 2022, 'Hijau', 200000.00, 'Tersedia');
