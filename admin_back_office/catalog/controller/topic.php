<?php 
    class TopicController extends Controller {
        public function index(){
            $data['title']  = "ประเภทเรื่องร้องเรียน";
            $data['lists']  = $this->model('topic')->getLists();

            $this->view('topic/home',$data);
        }
        public function add(){
            $data['title']  = "เพิ่มประเภทเรื่องร้องเรียน";
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $post       = $_POST;
                $insert     = $this->model('topic')->addTopic($post);
                if($insert){
                    redirect('topic');
                }
            }
            $this->view('topic/add',$data);
        }
        public function edit(){
            $data['title']  = "แก้ไขประเภทเรื่องร้องเรียน";

            $id             = $_GET['id'];
            $topic          = $this->model('topic');
            $data['data']   = $topic->getList($id);
            $data['lists_sub']  = $this->model('topic')->getListsSub($id);
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $post    = array(
                   'topic_title' => $_POST['topic_title']
                );
                $update  = $topic->updateTopic($id,$post);


                $sub = post('sub');

                $topic->delSubTopic($id);
                foreach($sub as $key => $val){
                    $topic->addSubTopic($id,$val);
                }
                if($update){
                   redirect('topic/edit&id='.$id);
                }
            }
            $this->view('topic/edit',$data);
        }
        public function sort(){
            $id     = $_GET['id'];
            $post   = array(
                'sort'  => $_POST['sort']
            );
            $update   = $this->model('topic')->sortEdit($id,$post);
            if($update){
                redirect('topic');
            } 
        }
    }
?>