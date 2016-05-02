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

    public function get($page) {
        $this->db->order_by('convert(title using gbk)', 'ASC');
        $book = $this->db->get('book', 10, ($page - 1) * 10);
        return $book->result_array();
    }

    public function count() {
        return $this->db->count_all('book') / 10 + 1;
    }

    public function search($page) {
        $this->db->order_by('convert(title using gbk)', 'ASC');
        $title = $this->input->get('title');
        $category = $this->input->get('category');
        $publisher = $this->input->get('publisher');
        $author = $this->input->get('author');
        $pubdate1 = $this->input->get('date1');
        $pubdate2 = $this->input->get('date2');
        $price1 = $this->input->get('price1');
        $price2 = $this->input->get('price2');
        if ($category != '') $this->db->like('category', $category);
        if ($title != '') $this->db->like('title', $title);
        if ($publisher != '') $this->db->like('publisher', $publisher);
        if ($author != '') $this->db->like('author', $author);
        if ($pubdate1 != '') $this->db->where('pubdate >', $pubdate1);
        if ($pubdate2 != '') $this->db->where('pubdate <', $pubdate2);
        if ($price1 != '') $this->db->where('price >', $price1);
        if ($price2 != '') $this->db->where('price <', $price2);
        $book = $this->db->get('book', 10, ($page - 1) * 10);
        return $book->result_array();
    }

    public function count_result() {
        $title = $this->input->get('title');
        $category = $this->input->get('category');
        $publisher = $this->input->get('publisher');
        $author = $this->input->get('author');
        $pubdate1 = $this->input->get('date1');
        $pubdate2 = $this->input->get('date2');
        $price1 = $this->input->get('price1');
        $price2 = $this->input->get('price2');
        if ($category != '') $this->db->like('category', $category);
        if ($title != '') $this->db->like('title', $title);
        if ($publisher != '') $this->db->like('publisher', $publisher);
        if ($author != '') $this->db->like('author', $author);
        if ($pubdate1 != '') $this->db->where('pubdate >', $pubdate1);
        if ($pubdate2 != '') $this->db->where('pubdate <', $pubdate2);
        if ($price1 != '') $this->db->where('price >', $price1);
        if ($price2 != '') $this->db->where('price <', $price2);
        $book = $this->db->get('book');
        if ($book->num_rows() == 0) return 1;
        return ($book->num_rows() - 1) / 10 + 1;
    }
}
