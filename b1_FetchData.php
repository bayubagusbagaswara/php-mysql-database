<?php

// PDO Statement memiliki function fetch()
// untuk menarik satu data dari hasil query
// ini berguna jika kita hanya mengambil data yang pertama saja dari PDO Statement
// function fetch() mengembalikan data array yag isinya data baris di table, isinya key dan value
// jika function fetch() return nilainya false maka sudah tidak ada data lagi didalam PDO Statement
// jika ingin mengambil seluruh data sekaligus, gunakan fetchAll()
require_once __DIR__ . "/GetConnection.php";
$connection = getConnection();

$username = "bayu";
$password = "rahasia";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

$statement = $connection->prepare($sql);
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
$statement->execute();

// ambil datanya dengan fetch()
if ($row = $statement->fetch()) {
    // balikan fetch adalah array
    // yang key nya adalah kolom-kolom dari table
    // kalau ada datanya maka sukses
    echo "Sukses login : " . $row["username"] . PHP_EOL;
} else {
    // tidak ada datanta maka gagal login
    echo "Gagal Login" . PHP_EOL;
}
// untuk mendapatkan data selanjutnya, untuk melihat isinya bisa di var_dump
var_dump($statement->fetch());

$connection = null;
