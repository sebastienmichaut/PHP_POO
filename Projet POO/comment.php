<?php

class Comment{

    //  Attributes

    private $id;
    private $id_post;
    private $commentContent;

    // Models

    public function __construct($data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = 'set' .ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getId_post(){
        return $this->id_post;
    }

    public function getCommentContent(){
        return $this->commentContent;
    }

    public function setId($id){
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setId_post($id_post){
        $id_post = (int) $id_post;
        if ($id_post > 0) {
            $this->id_post = $id_post;
        }
    }

    public function setCommentContent($commentContent){
        if (is_string($commentContent) && strlen($commentContent) > 3 && strlen($commentContent) < 2000 ) {
            $this->commentContent = $commentContent;
        }
    }
  }