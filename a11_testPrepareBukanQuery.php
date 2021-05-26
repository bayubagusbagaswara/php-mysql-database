<?php

// mencoba test prepare statement, tapi bukan untuk query
// Jadi Prepare Statement tidak hanya bisa digunakan untuk query (SELECT), tapi bisa untuk eksekusi perintah sql lainnya (INSERT, DELETE dll)
require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$username = "bayu";
$password = "rahasia";

$sql = "INSERT INTO admin(username, password) VALUES (:username, :password)";

$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);
// cukup melakukan execute, dan sudah selesai
$statement->execute();

$connection = null;
