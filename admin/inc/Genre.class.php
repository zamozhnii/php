<?php
    class Genre extends Mypdo {
        
        public $link;
        public $genre;

        public function __construct() {
            $this->link = new Mypdo();
        }

        public function createGenre() {
            $sql = "INSERT INTO genres(genre_name) VALUES (?)";
            $this->link->prepare($sql)->execute([$this->genre]);
            return $lastID = $this->link->lastInsertId();
        }

        public function updateGenre($genreUpdate) {
            $sql = "UPDATE authors SET author_name = '$this->genre'
                    WHERE author_name = '$genreUpdate'";
            $this->link->query($sql);
        }
    }