<?php
    class UserController extends Controller {
        public function index() {
            $data = array();
            $USER_GROUP_ID      = $this->getSession('USER_GROUP_ID');
            $menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
            $data['menu'] = array();
            $data['active_del'] = 0;
            $data['active_add'] = 0;
            $data['active_view'] = 0;
            $data['active_edit'] = 0;
            foreach($menu as $val){
                if($val['MENU_ID']=="17"){
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
                $data['lists'] = $this->model('user')->getLists();
            }
            $this->view('user/home',$data);
        }
        public function getAgencyMinor(){
            $id_agency = get('id_agency');
            $agencyMinor = $this->model('agency')->getlistsAgencyMinor($id_agency);
            $this->json($agencyMinor->rows);
        }
        public function add(){
            $data = array();
            $data['title'] = "เพิ่มผู้ใช้งาน";
            $data['result'] = get('result');
            $data['getGroups'] = $this->model('user')->getGroups();
            $data['agency'] = $this->model('agency')->getlistsAgency();
            $data['agencyMinor'] = $this->model('agency')->getlistsAgencyMinor();
            $data['position'] = $this->model('user')->getPosition();
            $data['action'] = route('user/submitAdd');
            $this->view('user/form',$data);
        }
        public function submitAdd(){
            if(method_post()){
                $input = $_POST;
                if($this->model('user')->checkUser($input['AUT_USERNAME'])){
                    redirect('user/form&result=ไม่สามารถใช้ชื่อผู้ใช้นี้ได้ ชื่อผู้ใช้ซ้ำระบบ');
                }else{
                    unset($input['id']);
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
        public function submitEdit(){
            if(method_post()){
                $input = $_POST;
                // if($this->model('user')->checkUser($input['AUT_USERNAME'])){
                //     redirect('user/form&result=ไม่สามารถใช้ชื่อผู้ใช้นี้ได้ ชื่อผู้ใช้ซ้ำระบบ');
                // }else{
                    $user_id = (int)$this->getSession('AUT_USER_ID');
                    $date_current = date('Y-m-d H:i:s');
                    // $input['CREATE_USER_ID'] = $user_id;
                    $input['UPDATE_USER_ID'] = $user_id;
                    // $input['CREATE_TIMESTAMP'] = $date_current;
                    $input['UPDATE_TIMESTAMP'] = $date_current;
                    $input['DELETE_FLAG'] = '0';
                    $id = (int)$input['id'];
                    $this->model('user')->updateUser($id,$input);
                    redirect('user');
                // }
            }
        }
        public function edit(){
            $data = array();
            $data['title'] = "แก้ไขผู้ใช้งาน";
            $data['result'] = get('result');
            $id = get('id');
            $data['getGroups'] = $this->model('user')->getGroups();
            $data['user'] = $this->model('user')->getUser($id);
            $data['position'] = $this->model('user')->getPosition();
            $data['agency'] = $this->model('agency')->getlistsAgency();
            $data['agencyMinor'] = $this->model('agency')->getlistsAgencyMinor();
            // var_dump($data['user']);
            $data['action'] = route('user/submitEdit');
            $data['id'] = $id;
            $this->view('user/form',$data);
        }
        public function group() {
            $data = array();
            $USER_GROUP_ID      = $this->getSession('USER_GROUP_ID');
            $menu = $this->model('user')->getMenu(array('group_menu_id'=>$USER_GROUP_ID))->rows;
            $data['menu'] = array();
            $data['active_del'] = 0;
            $data['active_add'] = 0;
            $data['active_view'] = 0;
            $data['active_edit'] = 0;
            foreach($menu as $val){
                if($val['MENU_ID']=="18"){
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
                $data['getGroups'] = $this->model('user')->getGroups();
            }
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
        public function settingPerson() {
            // บุคคล
            $data = array();
            $data['title'] = '';
            // $group_id = get('group_id');
            $id = get('id');
            $type=1;
            $arrMenu = array(
                            'type'  =>$type,
                            'id'    =>$id
                        );
            $data['menu'] = $this->model('user')->getMenu($arrMenu);
            $data['action'] = route('user/submitSettingPerson');
            // $data['group_id'] = $group_id;
            $data['type'] = $type;
            $data['id'] = $id;
            $this->view('permission/setting',$data);
        }
        public function settingPosition() {
            // บุคคล
            $data = array();
            $data['title'] = '';
            // $group_id = get('group_id');
            $id = get('id');
            $type=2;
            $arrMenu = array(
                            'type'          =>$type,
                            'position_id'   =>$id
                        );
            $data['menu'] = $this->model('user')->getMenu($arrMenu);
            $data['action'] = route('user/submitSettingPosition');
            // $data['group_id'] = $group_id;
            $data['type'] = $type;
            $data['position_id'] = $id;
            $this->view('permission/setting',$data);
        }
        public function settingAgency() {
            // บุคคล
            $data = array();
            $data['title'] = '';
            // $group_id = get('group_id');
            $id = get('id');
            $type=3;
            $arrMenu = array(
                            'type'        =>$type,
                            'agency_id'   =>$id
                        );
            $data['menu'] = $this->model('user')->getMenu($arrMenu);
            $data['action'] = route('user/submitSetting');
            // $data['group_id'] = $group_id;
            $data['type'] = $type;
            $data['agency_id'] = $id;
            $this->view('permission/setting',$data);
        }
        public function submitSetting(){
            if(method_post()){
                $insert = array();

                $group_id = (int)post('group_id');
                $menu_id = post('menu_id');
                $user_view = post('user_view');
                $user_add = post('user_add');
                $user_edit = post('user_edit');
                $user_del = post('user_del');

                $user_accept = post('user_accept');
                $user_change = post('user_change');
                $user_send = post('user_send');
                $user_topic = post('user_topic');
                $user_opm = post('user_opm');

                $user_shortcut = post('user_shortcut');
                $user_graph = post('user_graph');
                $user_graph_sub = post('user_graph_sub');

                if($group_id){
                    $insert = array();
                    foreach($menu_id as $key => $val){
                        $insert[] = array(
                            'AUT_GROUP_MENU_ID' => $group_id,
                            'MENU_ID'           => $menu_id[$key],
                            'USER_VIEW'         => $user_view[$key],
                            'USER_ADD'          => $user_add[$key],
                            'USER_EDIT'         => $user_edit[$key],
                            'USER_DELETE'       => $user_del[$key],
                            'user_accept'       => $user_accept[$key], 
                            'user_change'       => $user_change[$key], 
                            'user_send'         => $user_send[$key], 
                            'user_topic'        => $user_topic[$key], 
                            'user_opm'          => $user_opm[$key], 
                            'user_shortcut'     => $user_shortcut[$key], 
                            'user_graph'        => $user_graph[$key], 
                            'user_graph_sub'    => $user_graph_sub[$key], 
                        );
                    }
                }
                $this->model('user')->saveMenu($insert,$group_id);
                redirect('user/setting&group_id='.$group_id);
            }
        }
        public function submitSettingPerson(){
            if(method_post()){
                $insert = array();

                $id = (int)post('id');
                $menu_id = post('menu_id');
                $user_view = post('user_view');
                $user_add = post('user_add');
                $user_edit = post('user_edit');
                $user_del = post('user_del');

                $user_accept = post('user_accept');
                $user_change = post('user_change');
                $user_send = post('user_send');
                $user_topic = post('user_topic');
                $user_opm = post('user_opm');

                $user_shortcut = post('user_shortcut');
                $user_graph = post('user_graph');
                $user_graph_sub = post('user_graph_sub');

                if($id){
                    // var_dump($user_view);exit();
                    $insert = array();
                    foreach($menu_id as $key => $val){
                        $insert[] = array(
                            'user_id'           => $id,
                            'type'              => 1,
                            'MENU_ID'           => (isset($menu_id[$key])?$menu_id[$key]:''),
                            'USER_VIEW'         => (isset($user_view[$key])?$user_view[$key]:''),
                            'USER_ADD'          => (isset($user_add[$key])?$user_add[$key]:''),
                            'USER_EDIT'         => (isset($user_edit[$key])?$user_edit[$key]:''),
                            'USER_DELETE'       => (isset($user_del[$key])?$user_del[$key]:''),
                            'user_accept'       => (isset($user_accept[$key])?$user_accept[$key]:''), 
                            'user_change'       => (isset($user_change[$key])?$user_change[$key]:''), 
                            'user_send'         => (isset($user_send[$key])?$user_send[$key]:''), 
                            'user_topic'        => (isset($user_topic[$key])?$user_topic[$key]:''), 
                            'user_opm'          => (isset($user_opm[$key])?$user_opm[$key]:''), 
                            'user_shortcut'     => (isset($user_shortcut[$key])?$user_shortcut[$key]:''), 
                            'user_graph'        => (isset($user_graph[$key])?$user_graph[$key]:''), 
                            'user_graph_sub'    => (isset($user_graph_sub[$key])?$user_graph_sub[$key]:''), 
                        );
                    }
                }

                $this->model('user')->saveMenuPerson($insert,$id);
                redirect('user/settingPerson&id='.$id);
            }
        }
        public function submitSettingPosition(){
            if(method_post()){
                $insert = array();

                $id = (int)post('position_id');
                $menu_id = post('menu_id');
                $user_view = post('user_view');
                $user_add = post('user_add');
                $user_edit = post('user_edit');
                $user_del = post('user_del');

                $user_accept = post('user_accept');
                $user_change = post('user_change');
                $user_send = post('user_send');
                $user_topic = post('user_topic');
                $user_opm = post('user_opm');

                $user_shortcut = post('user_shortcut');
                $user_graph = post('user_graph');
                $user_graph_sub = post('user_graph_sub');

                if($id){
                    // var_dump($user_view);exit();
                    $insert = array();
                    foreach($menu_id as $key => $val){
                        $insert[] = array(
                            'position_id'           => $id,
                            'type'              => 2,
                            'MENU_ID'           => (isset($menu_id[$key])?$menu_id[$key]:''),
                            'USER_VIEW'         => (isset($user_view[$key])?$user_view[$key]:''),
                            'USER_ADD'          => (isset($user_add[$key])?$user_add[$key]:''),
                            'USER_EDIT'         => (isset($user_edit[$key])?$user_edit[$key]:''),
                            'USER_DELETE'       => (isset($user_del[$key])?$user_del[$key]:''),
                            'user_accept'       => (isset($user_accept[$key])?$user_accept[$key]:''), 
                            'user_change'       => (isset($user_change[$key])?$user_change[$key]:''), 
                            'user_send'         => (isset($user_send[$key])?$user_send[$key]:''), 
                            'user_topic'        => (isset($user_topic[$key])?$user_topic[$key]:''), 
                            'user_opm'          => (isset($user_opm[$key])?$user_opm[$key]:''), 
                            'user_shortcut'     => (isset($user_shortcut[$key])?$user_shortcut[$key]:''), 
                            'user_graph'        => (isset($user_graph[$key])?$user_graph[$key]:''), 
                            'user_graph_sub'    => (isset($user_graph_sub[$key])?$user_graph_sub[$key]:''), 
                        );
                    }
                }

                $this->model('user')->saveMenuPerson($insert,$id);
                redirect('user/settingPosition&id='.$id);
            }
        }
        public function submitSettingAgency(){
            if(method_post()){
                $insert = array();

                $id = (int)post('agency_id');
                $menu_id = post('menu_id');
                $user_view = post('user_view');
                $user_add = post('user_add');
                $user_edit = post('user_edit');
                $user_del = post('user_del');

                $user_accept = post('user_accept');
                $user_change = post('user_change');
                $user_send = post('user_send');
                $user_topic = post('user_topic');
                $user_opm = post('user_opm');

                $user_shortcut = post('user_shortcut');
                $user_graph = post('user_graph');
                $user_graph_sub = post('user_graph_sub');

                if($id){
                    // var_dump($user_view);exit();
                    $insert = array();
                    foreach($menu_id as $key => $val){
                        $insert[] = array(
                            'agency_id'           => $id,
                            'type'              => 3,
                            'MENU_ID'           => (isset($menu_id[$key])?$menu_id[$key]:''),
                            'USER_VIEW'         => (isset($user_view[$key])?$user_view[$key]:''),
                            'USER_ADD'          => (isset($user_add[$key])?$user_add[$key]:''),
                            'USER_EDIT'         => (isset($user_edit[$key])?$user_edit[$key]:''),
                            'USER_DELETE'       => (isset($user_del[$key])?$user_del[$key]:''),
                            'user_accept'       => (isset($user_accept[$key])?$user_accept[$key]:''), 
                            'user_change'       => (isset($user_change[$key])?$user_change[$key]:''), 
                            'user_send'         => (isset($user_send[$key])?$user_send[$key]:''), 
                            'user_topic'        => (isset($user_topic[$key])?$user_topic[$key]:''), 
                            'user_opm'          => (isset($user_opm[$key])?$user_opm[$key]:''), 
                            'user_shortcut'     => (isset($user_shortcut[$key])?$user_shortcut[$key]:''), 
                            'user_graph'        => (isset($user_graph[$key])?$user_graph[$key]:''), 
                            'user_graph_sub'    => (isset($user_graph_sub[$key])?$user_graph_sub[$key]:''), 
                        );
                    }
                }

                $this->model('user')->saveMenuPerson($insert,$id);
                redirect('user/settingAgency&id='.$id);
            }
        }
    }
?>