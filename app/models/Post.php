<?php
//  Dans cette class on va faire les requetes SQL pour les posts
// On commence par instacier la class Database pour pouvoir faire des requetes SQL
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts($limit, $offset) {
        $this->db->query('
            SELECT *, posts.id as postId 
            FROM posts 
            JOIN users ON posts.id_user = users.id 
            ORDER BY posts.dateCreated DESC 
            LIMIT :limit OFFSET :offset
        ');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        return $this->db->findAll();
    }

    public function getPostById($id) {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->findOne();
    }

    public function addPost($data){
        $this->db->query("INSERT INTO posts (title, content, id_user) VALUES (:title, :content, :id_user)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['body']);
        $this->db->bind(':id_user', $data['id_user']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($dataToUpdate){
        if (count($dataToUpdate) <= 1) { 
            return true; 
        }
        $clauseSet = [];
        $parameters = [];
        foreach($dataToUpdate as $key => $value){
            if($key !== "id"){
            $clauseSet[] = "$key = :$key";
            $parameters[":$key"] = $value;
            } else {
                $parameters[":id"] = $value;
            }
        }
        $sql = "UPDATE posts SET " . implode(",", $clauseSet) . " WHERE id = :id";
        $this->db->query($sql);
        foreach($parameters as $key => $value){
            $this->db->bind($key, $value);
        }
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      
}


