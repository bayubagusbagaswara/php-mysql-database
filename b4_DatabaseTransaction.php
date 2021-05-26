<?php


// jika kita ingin menggunakan transaction di PDO maka gunakan function beginTransaction()
// perintah tersebut harus diinisialisasi di awal
// dan untuk commit transaksi, ini jika transaksi nya berhasil, gunakan function commit()
// jika ingin membatalkan datanya, bisa gunakan rollback()

require_once __DIR__ . "/GetConnection.php";
$connection = getConnection();

// inisial awal begin
$connection->beginTransaction();

// $sql1 = "INSERT INTO comments(email, comment) VALUES('test@test.com', 'helloTest')";
// $sql2 = "INSERT INTO comments(email, comment) VALUES('test@test.com', 'helloTest')";
// $sql3 = "INSERT INTO comments(email, comment) VALUES('test@test.com', 'helloTest')";
// $sql4 = "INSERT INTO comments(emailss, comment) VALUES('test@test.com', 'helloTest')";

// execute statement
// $connection->exec($sql1);
// $connection->exec($sql2);
// $connection->exec($sql3);
// $connection->exec($sql4);
$connection->exec("INSERT INTO comments(email, comment) VALUES('test1@test.com', 'helloTest')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('test2@test.com', 'helloTest')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('test3@test.com', 'helloTest')");
$connection->exec("INSERT INTO comments(emailss, comment) VALUES('test4@test.com', 'helloTest')");


// selesai transaksi, maka commit
$connection->commit();

// kalo mau batalin transaksi nya, gunakan rollback
$connection->rollBack(); // otomatis data transaksi tidak akan disimpan ke database

$connection = null;
