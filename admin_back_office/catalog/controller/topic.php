<?php 
    class TopicController extends Controller {
        public function index(){
            $data['title']  = "ประเภทเรื่องร้องเรียน";
            

            $USER_GROUP_ID      = $this->getSession('USER_GROUP_ID');
            $menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
            $data['menu'] = array();
            $data['active_del'] = 0;
            $data['active_add'] = 0;
            $data['active_view'] = 0;
            $data['active_edit'] = 0;
            foreach($menu as $val){
                if($val['MENU_ID']=="3"){
                    if($val['USER_DELETE']=="1"){
                        $data['active_del'] = 1;
                    }
                    if($val['USER_ADD']=="1"){
                        $data['active_add'] = 1;
                    }
                    if($val['USER_VIEW']=="1"){
                        $data['active_view'] = 1;
                    }
                    if($val['USER_EDIT']=="1"){
                        $data['active_edit'] = 1;
                    }
                }
            }
            if($data['active_view']){
                $data['lists']  = $this->model('topic')->getLists();
            }
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