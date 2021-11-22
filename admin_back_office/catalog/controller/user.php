<?php
    class UserController extends Controller {
        public function index() {
            $this->view('user/home');
        }
        public function add(){
            $this->view('user/add');
        }
        public function edit(){
            $this->view('user/edit');
        }
        public function group() {
            $this->view('permission/home');
        }
    }
?>