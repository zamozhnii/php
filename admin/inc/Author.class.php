<?php
    class Author extends Mypdo {
        
        public $link;
        public $author;

        public function __construct() {
            $this->link = new Mypdo();
        }

        public function createAuthor() {
            $sql = "INSERT INTO authors (author_name) VALUES (?)";
            $this->link->prepare($sql)->execute([$this->author]);
            return $lastID = $this->link->lastInsertId();
        }

        public function updateAuthor($authorUpdate) {
            $sql = "UPDATE authors SET author_name = '$this->author'
                    WHERE author_name = '$authorUpdate'";
            $this->link->query($sql);
        }
    }