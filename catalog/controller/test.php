<?php 
    class TestController extends Controller {
        public function index() {
            $data = array();
            $Geographies = $this->model('appeal')->getAppeal();
            echo "<pre>";
            var_dump($Geographies);
        }
    }
?>