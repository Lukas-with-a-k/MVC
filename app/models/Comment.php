<?php

class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addComment($data)
    {
   
        $this->db->query("INSERT INTO comments (comment, id_user, id_post) VALUES (:comment, :id_user, :id_post)");
        $this->db->bind(':comment', $data['comment']);
        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':id_post', $data['id_post']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getCommentsByPost($id_post)
    {
        $this->db->query(
            "SELECT comments.*, users.nom
            FROM comments
            JOIN users
            ON comments.id_user = users.id
            WHERE comments.id_post = :id_post
            ORDER BY comments.date DESC"
        );
        $this->db->bind('id_post', $id_post);
        return $this->db->findAll();
    }


    public function updateComment($data){
        $this->db->query(
        "UPDATE comments 
        SET comment = :comment
        WHERE id = :id");
        $this->db->bind(":comment", $data["comment"]);
        $this->db->bind(":id", $data["id_comment"]);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($id_comment){
        $this->db->query("DELETE FROM comments WHERE id = :id");
        $this->db->bind(":id", $id_comment);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}