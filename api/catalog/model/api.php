<?php 
      class ApiModel extends db {
            public function login($user='',$pass=''){
                  $result     = array();
                  $user       = $this->escape($user);
                  $pass       = md5($pass);
                  $sql = "SELECT * FROM AUT_USER 
                  WHERE AUT_USERNAME = '".$this->escape($user)."' 
                  AND AUT_PASSWORD='".$this->escape($pass)."' LIMIT 0,1";
                  $result_user = $this->query($sql);
                  if($result_user->num_rows){
                        $result = $result_user->row['AUT_USER_ID'];
                  }
                  return $result;
            }
            public function getCases($token="",$limit="",$status=""){
                  $result     = array();
                  $token      = $this->escape($token);
                  $limit      = $this->escape($limit);
                  $status     = (int)$this->escape($status);
                  $where_limit = '';
                  if($limit){
                        $where_limit = ' LIMIT 0,'.$limit;
                  }
                  $sql_user = "SELECT * FROM AUT_USER WHERE AUT_USER_ID = '".$token."' LIMIT 0,1";
                  $result_user = $this->query($sql_user);
                  if($result_user->num_rows){
                        $AUT_USER_ID      = $result_user->row['AUT_USER_ID'];
                        $id_agency        = $result_user->row['id_agency'];
                        $id_agency_minor  = $result_user->row['id_agency_minor'];

                        $left_join = '';
                        $where = '';
                        if($id_agency){
                            $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                            $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
                            if($id_agency_minor){
                                  $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
                              }
                        }
                        $where .= " AND a.`status` = ".$status;
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

                        $result_response = $this->query($sql);
                        if($result_response->num_rows){
                              $result = $result_response->rows;
                        }
                  }
                  return $result;
            }
            public function getCase($token="",$case_code=""){
                  $result     = array();
                  $token      = $this->escape($token);
                  $case_code  = $this->escape($case_code);

                  $sql_user = "SELECT * FROM AUT_USER WHERE AUT_USER_ID = '".$token."' LIMIT 0,1";
                  $result_user = $this->query($sql_user);
                  if($result_user->num_rows){
                        $AUT_USER_ID      = $result_user->row['AUT_USER_ID'];
                        $id_agency        = $result_user->row['id_agency'];
                        $id_agency_minor  = $result_user->row['id_agency_minor'];

                        $left_join = '';
                        $where = '';
                        if($id_agency){
                            $left_join = " INNER JOIN ep_response_status ON a.id = ep_response_status.id_response ";
                            $where .= " AND ep_response_status.id_agency = '".$id_agency."'";
                            if($id_agency_minor){
                                  $where .= " AND ep_response_status.id_agency_minor = '".$id_agency_minor."'";
                              }
                        }
                        // $where .= " AND a.`status` = ".$status;
                        if($case_code){
                              $where .= " AND a.`case_code` = '".$case_code."'";
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

                        LEFT JOIN PROVINCE ON a.`id_provinces` = PROVINCE.`PROVINCE_id` 
                        LEFT JOIN PROVINCE tp ON a.`t_id_provinces` = tp.`PROVINCE_id` 

                        LEFT JOIN AMPHUR ON a.`id_amphures` = AMPHUR.`AMPHUR_ID` 
                        LEFT JOIN AMPHUR ap ON a.`t_id_amphures` = ap.`AMPHUR_ID` 

                        LEFT JOIN TAMBON ON a.`id_districts` = TAMBON.`TAMBON_ID` 
                        LEFT JOIN TAMBON t ON a.`t_id_districts` = t.`TAMBON_ID` 
                        WHERE a.del = 0 ".$where."
                        ORDER BY a.id DESC  ";

                        $result_response = $this->query($sql);
                        if($result_response->num_rows){
                              $result = $result_response->row;
                        }
                  }
                  return $result;
            }
            public function getOperation($token="",$case_code=""){
                  $result     = array();
                  $token      = $this->escape($token);
                  $case_code  = $this->escape($case_code);

                  $sql_user = "SELECT * FROM AUT_USER WHERE AUT_USER_ID = '".$token."' LIMIT 0,1";
                  $result_user = $this->query($sql_user);
                  if($result_user->num_rows){
                        $AUT_USER_ID      = $result_user->row['AUT_USER_ID'];
                        $left_join = '';
                        $where = " ep_response.id <> '' ";

                        if($case_code){
                              $where .= " AND ep_response.`case_code` = '".$case_code."'";
                        }
                        $sql    = "SELECT 
                        ep_response_comment.note as note,
                        ep_response_comment.status as status,
                        ep_response_comment.file as file,
                        ep_response_comment.date_create as date_create,
                        ep_agency.agency_title as agency_title,
                        ep_agency_minor.agency_minor_title as agency_minor_title

                        FROM ep_response_comment 
                        LEFT JOIN ep_response ON ep_response.id = ep_response_comment.id_response 
                        LEFT JOIN ep_agency ON ep_agency.id = ep_response_comment.id_agency 
                        LEFT JOIN ep_agency_minor ON ep_agency_minor.id = ep_response_comment.id_agency_minor 
                        WHERE  ".$where;

                        $result_response = $this->query($sql);
                        if($result_response->num_rows){
                              $result = $result_response->rows;
                        }
                  }
                  return $result;
            }
            public function sendCase($token="",$case_code="",$comment=""){
                  $result     = array();
                  $token      = $this->escape($token);
                  $case_code  = $this->escape($case_code);
                  $comment    = $this->escape($comment);

                  $sql_user = "SELECT * FROM AUT_USER WHERE AUT_USER_ID = '".$token."' LIMIT 0,1";
                  $result_user = $this->query($sql_user);
                  if($result_user->num_rows){
                        $AUT_USER_ID      = $result_user->row['AUT_USER_ID'];
                        $id_agency        = $result_user->row['id_agency'];
                        $id_agency_minor  = $result_user->row['id_agency_minor'];

                        $sql_response = "SELECT * FROM ep_response WHERE case_code = '".$case_code."'";
                        $query_response = $this->query($sql_response);
                        if($query_response->num_rows){
                              $id_response = $query_response->row['id'];
                              $insert = array(
                                    'id_user'         => $AUT_USER_ID,
                                    'id_agency'       => $id_agency,
                                    'id_agency_minor' => $id_agency_minor,
                                    'id_response'     => $id_response,
                                    'note'            => $comment,
                                    'status'          => 0,
                                    'date_create'     => date('Y-m-d H:i:s')
                              );
                              $this->insert('response_comment',$insert);
                              $result     = array(
                                    'result'    => 'success',
                                    'desc'      => ''
                              );
                        }else{
                              $result     = array(
                                    'result'    => 'failed',
                                    'desc'      => 'Not found case code'
                              );
                        }
                  }else{
                        $result     = array(
                              'result'    => 'failed',
                              'desc'      => 'Not found token'
                        );
                  }
                  return $result;
            }
      }
?>