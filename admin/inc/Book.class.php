<?php
    class Book extends Mypdo {

        public $link;
        public $title;
        public $descr;
        public $price;

        public function __construct() {
            $this->link = new Mypdo();
        }

        public function createBook() {
            $sql = "INSERT INTO books(book_title, book_descr, book_price) VALUES (?, ?, ?)";
            $this->link->prepare($sql)->execute([$this->title, $this->descr, $this->price]);
            return $lastID = $this->link->lastInsertId();
        }

        public function updateBook($id) {
            $sql = "UPDATE books SET books.book_title = '$this->title', 
                                     books.book_descr = '$this->descr', 
                                     books.book_price = '$this->price'
                    WHERE books.book_id = '$id'";
            $this->link->query($sql);
        }

        public function deleteBook($id) {
            $sql = "DELETE FROM books WHERE book_id = $id";
            $this->link->query($sql);
        }
    }