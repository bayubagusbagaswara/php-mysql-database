<?php 
// test untuk Koneksi PDO ke database
// memmbuat object PDO nya
$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$username = "root";
$password = "";

// koneksi ke database akan menyebabkan error Exception, maka harus try catch

try {
    $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
    echo "Sukses terkoneksi ke database MySQL" . PHP_EOL;

    // menutup koneksi PDO
    $connection = null;
} catch (PDOException $exception) {
    echo "Gagal terkoneksi ke database : " . $exception->getMessage() . PHP_EOL;
}
