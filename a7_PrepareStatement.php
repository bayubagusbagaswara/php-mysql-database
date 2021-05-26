<?php

// Prepare Statement untuk menghindari SQL Injection
// Prepare Statement akan menghasilkan object PDOStatement, dimana kita bisa melakukan binding parameter ke perintah SQL yang kita buat
// cara penulisan perintah sql juga diubah

require_once __DIR__ . "/GetConnection.php";

$connection = getConnection();

// buat perintah sql
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";

// hasil dari perintah sql adalah prepareStatement
$prepareStatement = $connection->prepare($sql);

// gimana ngisi parameter input ke perintah sql? dengan cara binding parameter

$connection = null;
