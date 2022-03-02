<?php
    class UserController extends Controller {
        public function index() {
            $data['lists'] = $this->model('user')->getLists();
            $this->view('user/home',$data);
        }
        public function add(){
            $data = array();
            $data['title'] = "เพิ่มผู้ใช้งาน";
            $data['result'] = get('result');
            $data['getGroups'] = $this->model('user')->getGroups();
            $data['agency'] = $this->model('agency')->getlists();
            $this->view('user/form',$data);
        }
        public function submitAdd(){
            if(method_post()){
                $input = $_POST;
                if($this->model('user')->checkUser($input['AUT_USERNAME'])){
                    redirect('user/form&result=ไม่สามารถใช้ชื่อผู้ใช้นี้ได้ ชื่อผู้ใช้ซ้ำระบบ');
                }else{
                    $user_id = (int)$this->getSession('AUT_USER_ID');
                    $date_current = date('Y-m-d H:i:s');
                    $input['CREATE_USER_ID'] = $user_id;
                    $input['UPDATE_USER_ID'] = $user_id;
                    $input['CREATE_TIMESTAMP'] = $date_current;
                    $input['UPDATE_TIMESTAMP'] = $date_current;
                    $input['DELETE_FLAG'] = 0;
                    $this->model('user')->addUser($input);
                    redirect('user');
                }
            }
        }
        public function edit(){
            $data = array();
            $data['title'] = "แก้ไขผู้ใช้งาน";
            $data['result'] = get('result');
            $id = get('id');
            $data['getGroups'] = $this->model('user')->getGroups();
            $data['user'] = $this->model('user')->getUser($id);
            $data['agency'] = $this->model('agency')->getlists();
            // var_dump($data['user']);
            $this->view('user/form',$data);
        }
        public function group() {
            $data = array();
            $data['getGroups'] = $this->model('user')->getGroups();
            $this->view('permission/home',$data);
        }
        public function addGroup() {
            $data = array();
            $data['title'] = 'เพิ่มกลุ่มผู้ใช้งาน';
            $data['action'] = route('user/submitAddGroup');
            $this->view('permission/addGroup',$data);
        }
        public function delGroup(){
            $group_id = get('group_id');
            $this->model('user')->delGroup($group_id);
            redirect('user/group');
        }
        public function submitAddGroup(){
            if(method_post()){
                $name = post('name');
                $user_id = (int)$this->getSession('AUT_USER_ID');
                $date_current = date('Y-m-d H:i:s');
                $insert = array(
                    'GROUP_NAME'        => $name,
                    'ACTIVE_STATUS'     => 1,
                    'CREATE_USER_ID'    => $user_id,
                    'UPDATE_USER_ID'    => $user_id,
                    'CREATE_TIMESTAMP'  => $date_current,
                    'UPDATE_TIMESTAMP'  => $date_current,
                );
                $group_id = $this->model('user')->addGroup($insert);
                redirect('user/setting&group_id='.$group_id);
            }
        }
        public function setting() {
            $data = array();
            $data['title'] = '';
            $group_id = get('group_id');
            $data['menu'] = $this->model('user')->getMenu(array('group_menu_id'=>$group_id));
            $data['action'] = route('user/submitSetting');
            $data['group_id'] = $group_id;
            $this->view('permission/setting',$data);
        }
        public function submitSetting(){
            if(method_post()){
                $insert = array();

                $group_id = (int)post('group_id');
                $menu_id = post('menu_id');
                $user_add = post('user_add');
                $user_edit = post('user_edit');
                $user_del = post('user_del');
                if($group_id){
                    $insert = array();
                    foreach($menu_id as $key => $val){
                        $insert[] = array(
                            'AUT_GROUP_MENU_ID' => $group_id,
                            'MENU_ID'           => $menu_id[$key],
                            'USER_ADD'          => $user_add[$key],
                            'USER_EDIT'         => $user_edit[$key],
                            'USER_DELETE'       => $user_del[$key]
                        );
                    }
                }
                $this->model('user')->saveMenu($insert,$group_id);
                redirect('user/setting&group_id='.$group_id);
            }
        }
    }
?>