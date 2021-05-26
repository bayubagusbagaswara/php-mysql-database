<?php
// bagaimana jika kita ingin query ke sql
// atau bisa disebut mengambil seluruh di database yang biasanya menggunakan perintah SELECT
require_once __DIR__ . "/GetConnection.php";
// bikin koneksi
$connection = getConnection();

// bikin perintah sql nya
$sql = "SELECT * FROM customers";

// jalankan perintah sql menggunakan function query() dan simpan ke variabel hasil dari query ke database
// $statement isinya adalah PDO Statement
$statement = $connection->query($sql);

// tutup koneksi
$connection = null;
