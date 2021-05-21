<?php

class PostsManager{
    
    // Attributes
    
    private $db;

    // Models

    public function __construct() {
       $this->setDb(new PDO('mysql:host=localhost;dbname=news;port=8889', 'root', 'root'));
    }
   
    public function setDb(PDO $db){
       $this->db = $db;
    }

    public function create(Post $post){
        $req = $this->db->prepare("INSERT INTO `post` (title, content) VALUES (:title, :content)");
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id){
       $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
       $req->bindValue(":id", $id, PDO::PARAM_INT);
       $req->execute();
       $post = $req->fetch();
       return new Post($post);
    }

    public function getAll(){
        $posts = [];
        foreach ($this->db->query("SELECT * FROM `post` ORDER BY id DESC") as $post){
            $posts[] = new Post($post);
        }
        return $posts;
    }

    public function update(Post $post){
        $req = $this->db->prepare("UPDATE `post` SET title = :title, content = :content WHERE id = :id");
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

}