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

    public function createComment(Comment $comment){
        $req = $this->db->prepare("INSERT INTO `comment` (commentContent) VALUES (:commentContent) WHERE id_post = :id_post");
        $req->bindValue(":id_post", $comment->getId_post(), PDO::PARAM_INT);
        $req->bindValue(":commentContent", $comment->getCommentContent(), PDO::PARAM_STR);
        $req->execute();
    }

    public function get(int $id){
       $req = $this->db->prepare("SELECT * FROM `post` WHERE id = :id");
       $req->bindValue(":id", $id, PDO::PARAM_INT);
       $req->execute();
       $data = $req->fetch();
       return new Post($data);
    }

    public function getAll(){
        $posts = [];
        foreach ($this->db->query("SELECT * FROM `post` ORDER BY id DESC") as $data){
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function getAllComment(){
        $comments = [];
        foreach ($this->db->query("SELECT * FROM `comment` WHERE id_post = :id_post ORDER BY id DESC") as $data){
            $comments[] = new Comment($data);
        }
        return $comments;
    }    

    public function update(Post $post){
        $req = $this->db->prepare("UPDATE `post` SET title = :title, content = :content WHERE id = :id");
        $req->bindValue(":id", $post->getId(), PDO::PARAM_INT);
        $req->bindValue(":title", $post->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $post->getContent(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(int $id){
        $req = $this->db->prepare("DELETE FROM `post` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function deleteComment(int $id_post){
        $req = $this->db->prepare("DELETE FROM `comment` WHERE id_post = :id_post");
        $req->bindValue(":id", $id_post, PDO::PARAM_INT);
        $req->execute();
    }

}