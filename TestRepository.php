<?php
require_once __DIR__ . "/Model/Comment.php";
require_once __DIR__ . "/GetConnection.php";
require_once __DIR__ . "/Repository/InterfaceRepository/CommentRepository.php";
require_once __DIR__ . "/Repository/ImplementasiRepository/CommentRepositoryImpl.php";

use Model\Comment;

$connection = getConnection();

// bikin repository
$repository = new CommentRepositoryImpl($connection);

// coba insert data untuk test insert
// $comment = new Comment(email: "repository@test.com", comment: "Hi");
// $newComment = $repository->insert($comment);

// // lihat id nya
// var_dump($newComment->getId());

// test untuk findById, dan masukkan idnya
// jika id nya tidak ada di database, maka null
// $comment = $repository->findById(2);
// var_dump($comment);

// test untuk findAll
$comment = $repository->findAll();
var_dump($comment);

$connection = null;
