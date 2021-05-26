<?php


// Binding parameter index, jika ternyata parameter kita sangat banyak
// kita mengganti format penulisan parameter di script sql menjadi tanda tanya (?)
// tapi saat bindParam itu menggunakan parameter indexnya bukan nama parameter

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

$statement = $connection->prepare($sql);
// bind parameter dengan index parameternya yakni angka urutan parameternya
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);

$statement->execute();

$success = false;
$find_user = null;

foreach ($statement as $row) {
    $success = true;
    $find_user = $row["username"];
}

if ($success) {
    echo "Sukses login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

$connection = null;
