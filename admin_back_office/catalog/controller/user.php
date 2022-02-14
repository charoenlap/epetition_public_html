<?php
    class UserController extends Controller {
        public function index() {
            $data['lists'] = $this->model('user')->getLists();
            $this->view('user/home',$data);
        }
        public function add(){
            $this->view('user/add');
        }
        public function edit(){
            $this->view('user/edit');
        }
        public function group() {
            $data = array();
            $data['getGroups'] = $this->model('user')->getGroups();
            $this->view('permission/home',$data);
        }
        public function setting() {
            $data = array();
            $data['title'] = '';
            // $data['getGroups'] = $this->model('user')->getGroups();
            $this->view('permission/setting',$data);
        }
    }
?>