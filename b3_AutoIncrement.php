<?php
// kadang kita ingin mengambil data id yang sudah kita insert ke dalam MySQL
// sebenarnya bisa melakukan dengan cara query ulang ke database menggunakan SELECT LAST_INSERT_ID()
// di PDO kita bisa menggunakan function lastInsertId() untuk mendapatkan Id terakhir yang dibuat secara auto increment

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

// lakukan insert data dulu
$sql = "INSERT INTO comments(email, comment) VALUES('bayu@test.com', 'testHai')";
// execute
$connection->exec($sql);
// jika ingin mengetahui id terakhir data yang kita insert
$id = $connection->lastInsertId();

echo "Id : " . $id . PHP_EOL;

$connection = null;
