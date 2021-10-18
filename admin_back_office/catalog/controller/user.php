<?php
    class UserController extends Controller {
        public function index() {
            $this->view('user/home');
        }
        public function group() {
            $this->view('permission/home');
        }
    }
?>