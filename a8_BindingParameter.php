<?php

// binding parameter yakni memasukkan parameter input user ke perintah sql, yang kemudian akan dieksekusi oleh prepare statement

// caranya adalah dengan bindParam, urutannya adalah index-1 adalah nama parameter di perintah sql, dan index-2 adalah parameter dari user nya
require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

// parameter input user
$username = "admin";
$password = "admin";

// perintah sql
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

// buat prepare statement
$statement = $connection->prepare($sql);
// bind parameter
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);

// execute untuk mengeksekusi script sql nya
$statement->execute();

// karena ini execute query, oleh itu hasilnya sudah disimpan dalam $statement yang isinya adalah PDO Statement

// ambil datanya
// inisial success adalah false
$success = false;
$find_user = null;
// jika statement ada baris record datanya, maka sukses true
foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row["username"];
}

// jika sukses true
if ($success) {
    echo "Sukses login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

$connection = null;
