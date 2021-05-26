<?php

// bagaimana kita mengambil data hasil query dari database
// data balikan dari database berupa PDO Statement
// karena PDO Statement adalah turunan dari IteratorAggregate, makanya bisa menggunakan foreach
// jadi gunakan foreach untuk mendapatkan tiap baris record hasil dari Query SQL nya

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

// $sql = "SELECT * FROM customers";
// idealnya jangan menggunakan *
$sql = "SELECT id, name, email FROM customers";

$statement = $connection->query($sql);

// ambil datanya dari $statement, tiap bari
foreach ($statement as $row) {
    // var_dump($row); // hasilnya array key of value
    // key nya adalah nama kolom nya
    // value nya adalah isi dari kolom nya
    // pecah sesuai nama kolomnya
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];

    echo "Id : $id" . PHP_EOL;
    echo "Name : $name" . PHP_EOL;
    echo "Email : $email" . PHP_EOL;
}

$connection = null;
