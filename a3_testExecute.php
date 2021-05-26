<?php
// mengirimkan perintah sql ke PDO 

require_once __DIR__ . "/GetConnection.php";

// buat koneksi
$connection = getConnection();

// buat script perintah sql nya
$sql = "INSERT INTO customers(id, name, email) VALUES ('bayu', 'Bayu', 'bayu@gmail.com'),
('bagus', 'Bagus', 'bagus@gmail.com'),
('aan', 'Aan', 'aan@gmail.com')
";

// eksekusi perintah sql
// perintah execute hanya untuk perintah sql yang tanpa hasil, jadi jika mengirim perintah SELECT tidak bisa menggunakan execute
$connection->exec($sql);
// tutup koneksi
$connection = null;
