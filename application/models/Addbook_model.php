<?php

class addbook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function getCat($tags) {
        $cat = array_pop($tags);
        return $cat['title'];
    }

    public function set($book) {
        $book['isbn'] = $book['isbn10'];
        $book['category'] = $this->getCat($book['tags']);
//        echo $book['category'];
        $book['total'] = rand(5, 10);
        $book['stock'] = rand(1, $book['total']);
        $author = $book['author'][0];
        unset($book['author']);
        $book['author'] = $author;
        unset($book['isbn10']);
        unset($book['tags']);
        $this->db->insert('book', $book);
    }

    public function get() {
        $book = $this->db->get('book',10,20);
        return $book->result_array();
    }
}
