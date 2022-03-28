<?php 
    class ResponseModel extends db {
        public function checkCaseOPM($case_code_opm = 0){
            $result = '';
            // $case_code_opm = (isset($data['case_code_opm'])?$data['case_code_opm']:'');
            $case_code_opm = $this->escape($case_code_opm);
            if($case_code_opm){
                $sql = "SELECT * FROM ep_response WHERE case_code_opm = '".$case_code_opm."'";
                $result_check = $this->query($sql);
                if($result_check->num_rows){
                    $result = $result_check->row['case_code'];
                }
            }
            return $result;
        }
        public function insertResponseSend($data = array()){
            $this->insert('response_send',$data);
        } 
        public function inputResponse($data = array()){
            foreach($data as $val){
                $this->insert('response_status',$val);
            }
        } 
        public function inputComment($data = array()){
            // foreach($data as $val){
                $this->insert('response_comment',$data);
            // }
        } 
        public function updateStatus($data=array()){
            $id = (int)(isset($data['id'])?$data['id']:0);
            $status = (int)(isset($data['status'])?$data['status']:0);
            $approve_topic = (int)(isset($data['approve_topic'])?$data['approve_topic']:0);
            $approve_user_id = (int)(isset($data['approve_user_id'])?$data['approve_user_id']:0);
            $send_opm = (int)(isset($data['send_opm'])?$data['send_opm']:0);
            if($id){
                $sql = "UPDATE ep_response SET 
                        `status` = '".$status."',
                        `approve_topic` = '".$approve_topic."',
                        `approve_user_id` = '".$approve_user_id."',
                        `send_opm` = '".$send_opm."' 
                        WHERE id = '".(int)$id."'";
                $this->query($sql);
            }
        } 
        public function delResponse($id=0){
            $this->delete('response_status',"id='".$id."'");
        }
        public function getResponse($id=0){
            $result = array();
            $sql = "SELECT *,
                        ep_response_status.id AS id,
                        ep_response_status.date_create AS date_create
                    FROM ep_response_status 
                    LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_status.id_agency_minor
                    LEFT JOIN ep_agency ON ep_agency.id = ep_response_status.id_agency
                    LEFT JOIN ep_appeal ON ep_appeal.id = ep_response_status.id_appeal

            WHERE id_response = ".(int)$id;
            // echo $sql;exit();
            $result = $this->query($sql)->rows;
            // echo "<pre>";
            // var_dump($result);
            // exit();
            return $result;
        }
        public function getComment($id=0){
            $result = array();
            $sql = "SELECT *,ep_response_comment.id AS id,
                ep_response_comment.date_create AS date_create 
                FROM ep_response_comment 
                LEFT JOIN AUT_USER ON AUT_USER.AUT_USER_ID = ep_response_comment.id_user 
                LEFT JOIN ep_agency_minor ON AUT_USER.DEPARTMENT_ID = ep_agency_minor.id 
            WHERE id_response = ".(int)$id;
            // echo $sql;exit();
            $result = $this->query($sql);
            return $result->rows;
        }
        public function getlists($data = array()){
            $where = '';
            $id_agency = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $topic_id = (isset($data['topic_id'])?$data['topic_id']:'');
            $dateadd = (isset($data['dateadd'])?trim($data['dateadd']):'');
            $dateadd_time = (isset($data['dateadd_time'])?trim($data['dateadd_time']):'');
            $dateadd_end = (isset($data['dateadd_end'])?$data['dateadd_end']:'');
            $case_code = (isset($data['case_code'])?$data['case_code']:'');
            $department_id = (isset($data['department_id'])?$data['department_id']:'');
            $t_id_provinces = (isset($data['t_id_provinces'])?$data['t_id_provinces']:'');
            $date_end = (isset($data['date_end'])?$data['date_end']:'');
            $id_card = (isset($data['id_card'])?$data['id_card']:'');
            $name_lastname = (isset($data['name_lastname'])?$data['name_lastname']:'');
            $tel = (isset($data['tel'])?$data['tel']:'');
            $phone = (isset($data['phone'])?$data['phone']:'');
            $response_person = (isset($data['response_person'])?$data['response_person']:'');
            $status_id = (isset($data['status_id'])?$data['status_id']:'');
            $date_respect = (isset($data['date_respect'])?$data['date_respect']:'');
            $page = (isset($data['page'])?$data['page']:'');
            $addBy = (isset($data['addBy'])?$data['addBy']:'');

            if(!empty($topic_id)){
                $where .= " AND topic_id = '".$topic_id."'";
            }
            if(!empty($dateadd) and empty($dateadd_end)){
                $where .= " AND dateadd like '".$dateadd."%'";
            }
            if(!empty($dateadd_end)){
                $where .= " AND (dateadd BETWEEN '".$dateadd.' '.$dateadd_time."' AND '".$dateadd_end.' '.$dateadd_time."')";
            }
            if(!empty($case_code)){
                $where .= " AND case_code like '%".$case_code."%'";
            }
            if(!empty($department_id)){
                $where .= " AND department_id = '".$department_id."'";
            }
            if(!empty($t_id_provinces)){
                $where .= " AND t_id_provinces = '".$t_id_provinces."'";
            }
            if(!empty($date_end)){
                $where .= " AND date_end like '".$date_end."%'";
            }
            if(!empty($id_card)){
                $where .= " AND id_card like '%".$id_card."%'";
            }
            if(!empty($name_lastname)){
                $where .= " AND (name like '%".$name_lastname."%' OR lastname like '%".$name_lastname."%')";
            }
            if(!empty($tel)){
                $where .= " AND tel like '%".$tel."%'";
            }
            if(!empty($phone)){
                $where .= " AND phone like '%".$phone."%'";
            }
            if(!empty($date_respect)){
                $where .= " AND date_end like '".$date_respect."%'";
            }
            if(!empty($response_person)){
                $where .= " AND response_person like '%".$response_person."%'";
            }
            if(!empty($status_id)){
                $where .= " AND status = '".$status_id."'";
            }
            if(!empty($addBy)){
                $where .= " AND addBy = '".$addBy."'";
            }
            $limit = "0,".DEFAULT_LIMIT_PAGE;
            if($page){
                $limit_start    = ($page-1)*DEFAULT_LIMIT_PAGE;
                $limit_end      = DEFAULT_LIMIT_PAGE;
                $limit = $limit_start.','.$limit_end;
            }
            $limit = " LIMIT ".$limit;
            $left_join = '';
            if($id_agency_minor){
                $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                $where = " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
            }
            $sql    = "SELECT *,
            a.id as id, 
            `ep_status`.`status_class` as text_class,
            `ep_status`.`status_text` as text_status,
            `ep_status`.`status_icon` as status_icon,
            `ep_status`.`id` as status_id  
            FROM ep_response a 
            ".$left_join."
            LEFT JOIN ep_topic b ON a.topic_id = b.id 
            LEFT JOIN ep_status ON a.`status` = ep_status.`id` 
            LEFT JOIN PROVINCE ON a.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
            WHERE a.del = 0 ".$where."
            ORDER BY a.id DESC  ";
            // echo $sql;exit();

            $query  = $this->query($sql.$limit);
            $query_row  = $this->query($sql)->num_rows;
            $query->num_rows = $query_row;
            return $query;
        }
        public function getList($id){
            $sql    = "SELECT *,
            tp.PROVINCE_NAME AS t_PROVINCE_NAME,
            PROVINCE.PROVINCE_NAME AS PROVINCE_NAME, 
            ap.AMPHUR_NAME AS t_AMPHUR_NAME,
            AMPHUR.AMPHUR_NAME AS AMPHUR_NAME,
            t.TAMBON_NAME AS t_TAMBON_NAME,
            TAMBON.TAMBON_NAME AS TAMBON_NAME 
            FROM ep_response 
            LEFT JOIN PROVINCE ON ep_response.`id_provinces` = PROVINCE.`PROVINCE_id` 
            LEFT JOIN PROVINCE tp ON ep_response.`t_id_provinces` = tp.`PROVINCE_id` 

            LEFT JOIN AMPHUR ON ep_response.`id_amphures` = AMPHUR.`AMPHUR_ID` 
            LEFT JOIN AMPHUR ap ON ep_response.`t_id_amphures` = ap.`AMPHUR_ID` 

            LEFT JOIN TAMBON ON ep_response.`id_districts` = TAMBON.`TAMBON_ID` 
            LEFT JOIN TAMBON t ON ep_response.`t_id_districts` = t.`TAMBON_ID` 
            WHERE id = '".$id."'";
            $query  = $this->query($sql); 
            return $query->row;
        }
        public function del($id){
            $data = array(
                'del' => '1'
            );
            $query = $this->update('response',$data,'id='.$id);
            return $query; 
        }
        public function getTopic(){
            $query = $this->getdata("topic");
            return $query->rows;
        }
        public function addResponse($data=array()){
            $result = array(
                'result' => 'failed'
            );
            $case_code_opm = (isset($data['case_code_opm'])?$data['case_code_opm']:'');
            $case_code_opm = $this->escape($case_code_opm);
            if($case_code_opm){
                $sql = "SELECT * FROM ep_response WHERE case_code_opm = '".$case_code_opm."'";
                $result_check = $this->query($sql);
                if($result_check->num_rows == 0){
                    $day_end = 30;
                    $sql_config_day = "SELECT * FROM ep_config WHERE `name` = 'day_end'";
                    $query_config_day = $this->query($sql_config_day);
                    if($query_config_day->num_rows){
                        $day_end = $query_config_day->row['val'];
                    }

                    $dateadd=date('Y-m-d');
                    $date_end = date('Y-m-d', strtotime($dateadd. ' + '.$day_end.' days'));

                    $data['day_end']    = $day_end;
                    $data['dateadd']    = date('Y-m-d H:i:s'); 
                    $data['date_end']   = $date_end;
                    $data['status']     = 2;

                    $result_last_insert = $this->insert('response',$data);

                    $case_code = ((date('y')+43).date('m')).str_pad($result_last_insert,4,"0", STR_PAD_LEFT);
                    $sql_update = "UPDATE ep_response SET case_code = '".$case_code."' WHERE id=".$result_last_insert;
                    $query_update = $this->query($sql_update);

                    $result = array(
                        'result' => 'success'
                    );
                }else{
                    $result = array(
                        'result' => 'failed',
                        'desc'  => 'มีในระบบแล้ว'
                    );
                }
            }
            return $result;
        }
        public function updateResponse($data=array(),$id){
            $query = $this->update('response',$data,"id=".$id);
            return $query;
        }
    }
?>