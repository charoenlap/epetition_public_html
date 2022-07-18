<?php 
    class ResponseModel extends db {
        public function getTotalStatus($data = array()){
            $result = array();
            $status = array(
                1, // เสร็จสิ้นแล้ว
                2, // อยู่ระหว่างดำเนินการ
                4, // ยังไม่เสร็จ และช้ากว่ากำหนด
            );

            $id_agency          = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor    = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $role_id    = (isset($data['role_id'])?$data['role_id']:'');
            
            $where = "";
            if($id_agency){
                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
                if($id_agency_minor){
                    $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
                }
            }
            // echo $where;
            // exit();
            // เสร็จสิ้นแล้ว
            $sql_complete = "SELECT count(*) as total FROM (
                SELECT
                    COUNT(ep_response.case_code) AS total 
                FROM
                    ep_response
                    INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response
                    LEFT JOIN ep_topic b ON ep_response.topic_id = b.id
                    LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
                    LEFT JOIN PROVINCE ON ep_response.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
                WHERE
                    ep_response.`status` = 1 
                    AND ep_response.del <> 1 
                    ".$where."
                GROUP BY
                    ep_response.case_code
            ) t";
            $result_complete = $this->query($sql_complete);

            $sql_process = "SELECT count(*) as total FROM (
                SELECT
                    COUNT(ep_response.case_code) AS total 
                FROM
                    ep_response
                    INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response
                    LEFT JOIN ep_topic b ON ep_response.topic_id = b.id
                    LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
                    LEFT JOIN PROVINCE ON ep_response.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
                WHERE
                    ep_response.`status` = 2 
                    AND ep_response.del <> 1 
                    ".$where."
                GROUP BY
                    ep_response.case_code
            ) t";
            $result_process = $this->query($sql_process);

            $sql_incomplete = "SELECT count(*) as total FROM (
                SELECT
                    COUNT(ep_response.case_code) AS total 
                FROM
                    ep_response
                    INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response
                    LEFT JOIN ep_topic b ON ep_response.topic_id = b.id
                    LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
                    LEFT JOIN PROVINCE ON ep_response.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
                WHERE
                    ep_response.`status` = 4 
                    AND ep_response.del <> 1 
                    ".$where."
                GROUP BY
                    ep_response.case_code
            ) t";
            $result_incomplete = $this->query($sql_incomplete);

            $sql_sorpornor = "SELECT count(*) as total FROM (
                SELECT
                    COUNT(ep_response.case_code) AS total 
                FROM
                    ep_response
                    INNER JOIN ep_response_status ON ep_response.id = ep_response_status.id_response
                    LEFT JOIN ep_topic b ON ep_response.topic_id = b.id
                    LEFT JOIN ep_status ON ep_response.`status` = ep_status.`id`
                    LEFT JOIN PROVINCE ON ep_response.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
                WHERE
                    ep_response.`addBy` = 4 
                    AND ep_response.del <> 1 
                    ".$where."
                GROUP BY
                    ep_response.case_code
            ) t";
            $result_sorpornor = $this->query($sql_sorpornor);

            $all = $result_complete->row['total']+$result_process->row['total']+$result_incomplete->row['total'];
            $result = array(
                'complete'      => $result_complete->row['total'],
                'process'       => $result_process->row['total'],
                'incomplete'    => $result_incomplete->row['total'],
                'all'           => $all,
                'sorpornor'     => $result_sorpornor->row['total'],
                'ministry'      => $all - $result_sorpornor->row['total']
            );

            return $result;
        }
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
        public function insertCommentCustomer($data = array()){
            // foreach($data as $val){
                $this->insert('response_customer_comment',$data);
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
            // echo "test";
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
            $USER_GROUP_ID = (isset($data['USER_GROUP_ID'])?$data['USER_GROUP_ID']:'');
            $AUT_USER_ID = (isset($data['AUT_USER_ID'])?$data['AUT_USER_ID']:'');

            if(!empty($topic_id)){
                $where .= " AND topic_id = '".trim($topic_id)."'";
            }
            if(!empty($dateadd) and empty($dateadd_end)){
                $where .= " AND dateadd like '".trim($dateadd)."%'";
            }
            if(!empty($dateadd_end)){
                $where .= " AND (dateadd BETWEEN '".trim($dateadd).' '.$dateadd_time."' AND '".trim($dateadd_end).' '.trim($dateadd_time)."')";
            }
            if(!empty($case_code)){
                $where .= " AND case_code like '%".trim($case_code)."%'";
            }
            if(!empty($department_id)){
                $where .= " AND department_id = '".trim($department_id)."'";
            }
            if(!empty($t_id_provinces)){
                $where .= " AND t_id_provinces = '".trim($t_id_provinces)."'";
            }
            if(!empty($date_end)){
                $where .= " AND date_end like '".trim($date_end)."%'";
            }
            if(!empty($id_card)){
                $where .= " AND id_card like '%".trim($id_card)."%'";
            }
            if(!empty($name_lastname)){
                $where .= " AND (name like '%".trim($name_lastname)."%' OR lastname like '%".trim($name_lastname)."%')";
            }
            if(!empty($tel)){
                $where .= " AND tel like '%".trim($tel)."%'";
            }
            if(!empty($phone)){
                $where .= " AND phone like '%".trim($phone)."%'";
            }
            if(!empty($date_respect)){
                $where .= " AND date_end like '".trim($date_respect)."%'";
            }
            if(!empty($response_person)){
                $where .= " AND response_person like '%".trim($response_person)."%'";
            }
            if(!empty($status_id)){
                $where .= " AND a.status = '".trim($status_id)."'";
            }
            if(!empty($addBy)){
                $where .= " AND a.addBy = '".trim($addBy)."'";
            }
            // echo $addBy;exit();
            $limit = "0,".DEFAULT_LIMIT_PAGE;
            if($page){
                $limit_start    = ($page-1)*DEFAULT_LIMIT_PAGE;
                $limit_end      = DEFAULT_LIMIT_PAGE;
                $limit = $limit_start.','.$limit_end;
            }
            $limit = " LIMIT ".$limit;
            $left_join = '';
            $left_join = ($USER_GROUP_ID==1?'LEFT':'INNER')." JOIN ep_response_status ON a.id = ep_response_status.id_response ";
            if($id_agency_minor){
                // $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
            }
            if($id_agency){
                // $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
            }

            // echo $where;exit();
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
            LEFT JOIN ep_notification ON a.id = ep_notification.id_response AND id_user = '".(int)$AUT_USER_ID."'
            WHERE a.del = 0 ".$where." 
            GROUP BY a.case_code 
            ORDER BY a.id DESC  ";
            // echo $sql;exit();

            $query  = $this->query($sql.$limit);
            $query_row  = $this->query($sql)->num_rows;
            $query->num_rows = $query_row;
            return $query;
        }
        public function getNotification($data = array()){
            $where = '';
            $id_agency = (isset($data['id_agency'])?$data['id_agency']:'');
            $id_agency_minor = (isset($data['id_agency_minor'])?$data['id_agency_minor']:'');
            $AUT_USER_ID = (isset($data['AUT_USER_ID'])?$data['AUT_USER_ID']:'');
           
           
            $left_join = '';
            $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
            if($id_agency_minor){
                // $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
            }
            if($id_agency){
                // $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
            }

            $sql    = "SELECT 
            ep_notification.id_noti as id_noti  
            FROM ep_response a 
            ".$left_join."
            LEFT JOIN ep_topic b ON a.topic_id = b.id 
            LEFT JOIN ep_status ON a.`status` = ep_status.`id` 
            LEFT JOIN PROVINCE ON a.`t_id_provinces` = PROVINCE.`PROVINCE_id` 
            LEFT JOIN (SELECT * FROM ep_notification WHERE ep_notification.id_user = '".$AUT_USER_ID."' ) ep_notification ON a.id = ep_notification.id_response  
            WHERE a.del = 0 ".$where."
            ORDER BY a.id DESC  ";
            $query  = $this->query($sql);


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