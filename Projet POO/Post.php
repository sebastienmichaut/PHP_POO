<?php

class Post{

    //  Attributes

    private $id;
    private $title;
    private $content;

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

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function setId($id){
        $id = (int) $id;
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function setTitle($title){
        if (is_string($title) && strlen($title) > 3 && strlen($title) < 80 ) {
            $this->title = $title;
        }
    }

    public function setContent($content){
        if (is_string($content) && strlen($content) > 10 && strlen($content) < 2000 ) {
            $this->content = $content;
        }
    }
}