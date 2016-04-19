<?php

class addbook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('addbook_model');

    }

    public function index()
    {
        $data = "[";
        for ($id = 1820663; $id <= 1820763; $id += 1) {
            $url = "https://api.douban.com/v2/book/$id?fields=isbn10,title,tags,publisher,pubdate,author,price";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
            $ans = curl_exec($ch);
            curl_close($ch);
            $data = $data . $ans . ',';

        }
        $data = substr($data, 0, -1);
        $data = $data . "]";

        file_put_contents('/library/book3.json', $data);
        echo "success";
    }

    public function process() {
        $data = file_get_contents("/library/book3.json");
        $book = json_decode($data, true);
        foreach ($book as $eachbook)
            $this->addbook_model->set($eachbook);
    }

    public function display() {
        var_dump($this->addbook_model->get());
    }
}
