<?php

/**
 * sebagai interface repository
 * bikin kontrak method yg digunakan untuk koneksi dengan database
 */

namespace Repository {

    use Model\Comment;

    interface CommentRepository
    {
        // balikannya berupa object comment
        function insert(Comment $comment): Comment;

        // ada kemungkinan balikannya tidak ada id nya, jadi di database id nya kosong tidak ada datanya
        function findById(int $id): ?Comment;

        // balikannya array yg isinya array of comment
        function findAll(): array;
    }
}
