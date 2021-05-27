<?php

// lakukan implementasi dengan PHP Data Object
// makanya kita butuh koneksi PDO ke databasenya 

use Model\Comment;
use Repository\CommentRepository;

class CommentRepositoryImpl implements CommentRepository
{
    public function __construct(\PDO $connection)
    {
        // setipa bikin object ini maka akan selalu ada connection PDO nya
    }

    public function insert(Comment $comment): Comment
    {
        // bikin script perintah sql yang akan berkomunikasi dengan database
        $sql = "INSERT INTO comments(email, comment) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$comment->getEmail(), $comment->getComment()]);

        // ambil id nya
        $id = $this->connection->lastInsertId();
        // id nya kita set ke object comment
        $comment->setId($id);
        // kembalikan object comment
        return $comment;
        // jadi balikan comment dari function insert ini adalah comment yang sudah ada id nya
    }

    public function findById(int $id): ?Comment
    {
        // balikan function ini adalah Comment, tapi commentnya bisa null karena ada yang tidak punya id nya
        $sql = "SELECT * FROM comment WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        if ($row = $statement->fetch()) {
            // return new Comment(
            //     id: $row["id"],
            //     email: $row["email"],
            //     comment: $row["comment"]
            // );
        } else {
            return null;
        }
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM comment";
        $statement = $this->connection->query($sql);

        // simpan datanya di array
        $array = [];
        // lakukan fetch terus-terusan sampai bernilai false
        while ($row = $statement->fetch()) {
            // $array[] = new Comment(
            //     id: $row["id"],
            //     email: $row["email"],
            //     comment: $row["comment"]
            // );
        }
        return $array;
    }
}
