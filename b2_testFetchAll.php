<?php

// test fetchAll() untuk menarik semua data query
// kemudian akan disimpan dalam array
require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

$sql = "SELECT * FROM customers";
$statement = $connection->query($sql);

// fetch datanya
$customers = $statement->fetchAll();
var_dump($customers);
$connection = null;
