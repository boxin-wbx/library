<?php

/**
 * Created by PhpStorm.
 * User: longmen
 * Date: 16/4/13
 * Time: 下午9:08
 */
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('addbook_model');
        $this->load->model('home_model');
        if (!isset($_SESSION['name']))
            header('Location: /library/index.php/home/login'); // file name where you want to redirect after logout

    }

    public function addAdmin()
    {
        $this->load->library('form_validation');
        if ($_SESSION['id'] == 'root') {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_database');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
//            有待验证可靠性
                $data['content'] = '添加管理员';
                $this->load->view('header', $data);
                $this->load->view('addadmin');
                $this->load->view('footer');
            } else {
                $id = $this->input->post('username');
                $password = $this->input->post('password');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $this->home_model->set($id, $password, $name, $phone);
                $data['content'] = '主页';
                $this->load->view('header', $data);
                $this->load->view('footer');
            }
        } else {
            $data['content'] = '主页';
            $this->load->view('header', $data);
            $this->load->view('footer');
        }
    }

    public function add()
    {
        $this->load->library('form_validation');
        $data['content'] = '图书入库';
        $this->load->view('header', $data);
        $data['add'] = 0;
        $this->load->view('add', $data);
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('pubdate', 'Pubdate', 'trim|required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('addone');
            $this->load->view('footer');
        } else {
            $title = $this->input->post('title');
            $category = $this->input->post('category');
            $publisher = $this->input->post('publisher');
            $author = $this->input->post('author');
            $pubdate = $this->input->post('pubdate');
            $isbn = $this->input->post('isbn');
            $price = $this->input->post('price');
            $stock = $this->input->post('stock');
            $postdata['total'] = $stock;
            $postdata['title'] = $title;
            $postdata['category'] = $category;
            $postdata['author'] = $author;
            $postdata['pubdate'] = $pubdate;
            $postdata['isbn'] = $isbn;
            $postdata['price'] = $price;
            $postdata['publisher'] = $publisher;
            $postdata['stock'] = $stock;
            if ($this->addbook_model->setPostData($postdata))
                echo "<script> alert('插入成功'); </script>";
            else
                echo "<script> alert('插入了同样的书'); </script>";
            $this->load->view('addone');
            $this->load->view('footer');
        }
    }

    public function addmore()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'txt';
        $config['max_size'] = '1000'; //  最大 1M 的数据
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);

        $data['content'] = '图书入库';
        $this->load->view('header', $data);
        $data['add'] = 1;
        $this->load->view('add', $data);


        if (!$this->upload->do_upload('books')) {
//            array_push($data, array('error' => $this->upload->display_errors()));
            $data['error'] = $this->upload->display_errors();
            $this->load->view('addmore', $data);
            $this->load->view('footer');
        } else {
            $filename = $this->upload->data('file_name');
            $this->load->view('addmore', $data);
            $this->load->view('footer');
            echo "<script> alert('插入成功'); </script>";
            $raw = file_get_contents("./uploads/$filename");
            $data = $this->process($raw);
        }
    }

    function process($str)
    {
        foreach (preg_split("/((\r?\n)|(\r\n?))/", $str) as $line) {
            if ($line == '') {
                $line = substr($str, 0, -1);
                $line = substr($str, 1);
                $data = explode(",", $line);
                $res['isbn'] = $data[0];
                $res['category'] = $data[1];
                $res['title'] = $data[2];
                $res['publisher'] = $data[3];
                $res['pubdate'] = $data[4];
                $res['author'] = $data[5];
                $res['price'] = $data[6];
                $res['stock'] = $data[7];
                $res['total'] = $data[7];
                $this->addbook_model->setPostData($res);
                return;
            }
            $line = substr($line, 0, -1);
            $line = substr($line, 1);
            $data = explode(",", $line);
            $res['isbn'] = $data[0];
            $res['category'] = $data[1];
            $res['title'] = $data[2];
            $res['publisher'] = $data[3];
            $res['pubdate'] = $data[4];
            $res['author'] = $data[5];
            $res['price'] = $data[6];
            $res['stock'] = $data[7];
            $res['total'] = $data[7];
            $this->addbook_model->setPostData($res);
        }
    }

    public function addcard()
    {
        $this->load->library('form_validation');
        $data['content'] = '借书证管理';
        $this->load->view('header', $data);
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('identity', 'Identity', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('addcard', $data);
            $this->load->view('footer');
        } else {
            $res['name'] = $this->input->post('name');
            $res['id'] = $this->input->post('id');
            $res['department'] = $this->input->post('department');
            $res['identity'] = $this->input->post('identity');
            if ($this->addbook_model->addcard($res))
                echo "<script> alert('插入成功'); </script>";
            else
                echo "<script> alert('插入了同样的卡'); </script>";
            $this->load->view('addcard', $data);
            $this->load->view('footer', $data);

        }
    }

    public function deletecard()
    {
        $this->load->library('form_validation');
        $data['content'] = '借书证管理';
        $this->load->view('header', $data);
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('card');
            $this->load->view('footer', $data);
        } else {
            $id = $this->input->post('id');
            if ($this->addbook_model->deletecard($id))
                echo "<script> alert('删除成功'); </script>";
            else
                echo "<script> alert('卡不存在'); </script>";
            $this->load->view('card', $data);
            $this->load->view('footer', $data);
        }
    }

    function check_database($username)
    {
        //Field validation succeeded.  Validate against database
        if (!$this->home_model->get($username)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'username exists!');
            return false;
        }
    }

    public function borrow_book($id)
    {
        $book2 = $this->addbook_model->getRecord($id);
        $data['book2'] = $book2;
        $data['content'] = '借书';
        $data['id'] = $id;
        $this->load->library('form_validation');
        $this->load->view('header', $data);
        $this->load->view('borrowbook', $data);
        $this->form_validation->set_rules('isbn', 'ID', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('borrow_book', $data);
            $this->load->view('footer', $data);
        } else {
            $isbn = $this->input->post('isbn');
            $data['isbn'] = $isbn;
            $book = $this->addbook_model->getById($isbn);
            $data['book'] = $book;
            $data['num'] = count($book);
            $this->load->view('borrow_book', $data);
            $this->load->view('footer', $data);
        }
    }

    public function borrowbook()
    {
        $data['content'] = '借书';
        $this->load->view('header', $data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('borrowbook', $data);
            $this->load->view('footer', $data);
        } else {
            $id = $this->input->post('id');
            header("Location: /library/index.php/admin/borrow_book/$id");
        }
    }

    public function returnbook()
    {
        $data['content'] = '还书';
        $this->load->view('header', $data);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        if ($this->form_validation->run() == FALSE && $this->input->post('idsub') != 'idsub') {
            $this->load->view('returnbook', $data);
            $this->load->view('footer', $data);
        } else {
            $id = $this->input->post('id');
            $data['id'] = $id;
            $book = $this->addbook_model->getRecord($id);
            $data['book'] = $book;
            $this->load->view('returnbook', $data);

        }
    }

    public function return_book($isbn, $id) {
        if ($this->addbook_model->unsetRecord($isbn, $id)) {
            echo "<script> alert('还书成功'); window.location.href='/library/index.php/admin/returnbook'; </script>";
        } else {
            echo "<script> alert('还书失败'); window.location.href='/library/index.php/admin/returnbook'; </script>";
        }
    }


    public function borrow($isbn, $id)
    {
        if ($this->addbook_model->setRecord($isbn, $id)) {
            echo "<script> alert('借书成功'); window.location.href='/library/index.php/admin/borrowbook'; </script>";
        } else {
            echo "<script> alert('借书失败'); window.location.href='/library/index.php/admin/borrowbook'; </script>";
        }
    }
}