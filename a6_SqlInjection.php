<?php
// saat membuat perintah sql kita tidak mungkin harcode
// kita akan menerima input dari user, misal dari form, lalu membuat perintah sql, dan mengirimnya menggunakan perintah SQL

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();
// membuat sql dari input user
// $username = "admin";
// $password = "admin";

// masalah SQL Injection, jika input dari user salah, dan bisa menyebabkan kebobolan data, misal user salah menginputkan seperti dibawah
// $username = "admin'; #";
// $password = "admin";
// hasil setelah diquery tetap sukses, karena sql bisa membaca format diatas, dan mengira password adalah comment sehingga diabaikan

// $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
// SOLUSINYA adalah ganti cara penulisan perintah sql nya
// function query() dan exec() tidak bisa menangani celah SQL Injection, jika menang tidak butuh parameter input user maka boleh menggunakan 2 function tersebut
// jika membutuhkan parameter dari input user, kita wajib menggunakan function prepare(sql)
// atau memastikan input user aman dengan menggunakan function quote()

// jadi sebelum perintah sql dikirim maka quote dulu ada parameter input untuk menghindari karakter2 yang tidak diinginkan
$username = $connection->quote("admin");
$password = $connection->quote("admin");

// ganti format sql nya, tidak pakai petik satu
$sql = "SELECT * FROM admin WHERE username = $username AND password = $password";


$statement = $connection->query($sql);

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
