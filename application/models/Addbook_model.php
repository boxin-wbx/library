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

    public function setPostData($book) {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;

        if ($this->db->insert('book', $book))
            return true;
        return false;
        $this->db->db_debug = $db_debug;

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
        if ($pubdate1 != '') $this->db->where('pubdate >=', $pubdate1);
        if ($pubdate2 != '') $this->db->where('pubdate <=', $pubdate2);
        if ($price1 != '') $this->db->where('price >=', $price1);
        if ($price2 != '') $this->db->where('price <=', $price2);
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
        if ($pubdate1 != '') $this->db->where('pubdate >=', $pubdate1);
        if ($pubdate2 != '') $this->db->where('pubdate <=', $pubdate2);
        if ($price1 != '') $this->db->where('price >=', $price1);
        if ($price2 != '') $this->db->where('price <=', $price2);
        $book = $this->db->get('book');
        if ($book->num_rows() == 0) return 1;
        return ($book->num_rows() - 1) / 10 + 1;
    }

    public function addcard($card) {
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;

        if ($this->db->insert('card', $card))
            return true;
        return false;
        $this->db->db_debug = $db_debug;
    }

    public function deletecard($id) {
        $db_debug = $this->db->db_debug;
//        $this->db->db_debug = false;
        echo "<script> alert('1'); </script>";
        $this->db->where('id', $id);
        if ($this->db->delete('card'))
            return true;
        return false;
        $this->db->db_debug = $db_debug;
    }


    public function getById($isbn) {
        $this->db->where('isbn', $isbn);
        $book = $this->db->get('book');
        return $book->result_array();
    }

    public function getRecord($cid) {
        $this->db->where('cid', $cid);
        $this->db->where('returndate is null', null, false);
        $res = $this->db->get('record')->result_array();
        $book2 = array();
        foreach ($res as $item) {
            $slug = $this->getById($item['isbn']);
            array_push($book2, $slug[0]);
        }
        return $book2;
    }

    public function setRecord($isbn, $id) {
        $this->db->where('isbn', $isbn);
        $res = $this->db->get('book')->row_array();
        if ($res['stock'] == 0) {
            return false;
        }
        $this->db->set('stock', 'stock - 1', FALSE);
        $this->db->where('isbn', $isbn);
        $this->db->update('book');
        date_default_timezone_set('Asia/Shanghai');
        $data['cid']= $id;
        $data['isbn'] = $isbn;
        $data['aid'] = $_SESSION['id'];
        $data['borrowdate'] = date("Y-m-d");
        return $this->db->insert('record', $data);
    }

    public function unsetRecord($isbn, $id) {
        $this->db->set('stock', 'stock + 1', FALSE);
        $this->db->where('isbn', $isbn);
        $this->db->update('book');
        date_default_timezone_set('Asia/Shanghai');
        $this->db->where('cid', $id);
        $this->db->where('isbn', $isbn);
        $data = $this->db->get('record')->result_array();
        $query = $data[0];
        $query['returndate'] = date("Y-m-d");
        return $this->db->replace('record', $query);
    }
}
