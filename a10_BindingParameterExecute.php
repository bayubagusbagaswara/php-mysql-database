<?php

// melakukan binding parameter saat Execute
// execute sekaligus binding data parameter nya

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

$statement = $connection->prepare($sql);
// binding parameter dimasukkan dalam Array, jadi secara otomatis data array pertama dipake oleh parameter pertama, dan data array kedua dipake oleh parameter kedua
$statement->execute([$username, $password]);

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
