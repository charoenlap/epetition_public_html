<?php 
    class ReportModel extends db {
        public function getagencyMinorDepartment($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_agency_minor WHERE agency_minor_title !='ประชาชนทั่วไป'";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
            	$sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
            	LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
            	WHERE id_agency_minor = '".$val['id']."'";
            	$result_count_all = $this->query($sql_count);

            	$sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
            	LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
            	WHERE ep_response_status.id_agency_minor = '".$val['id']."' GROUP BY ep_response.`status`
            	";
            	$query_count_status = $this->query($sql_count_status);
            	$result_status = array();
            	foreach($query_count_status->rows as $cs){
            		$result_status[$cs['status']] = $cs['count_status'];
            	}

            	$result[] = array(
            		'agency_minor_title' 	=> $val['agency_minor_title'],
            		'count_all'				=> $result_count_all->row['count_all'],
            		'0'						=> (int)(isset($result_status[0])?$result_status[0]:''),
            		'complete'				=> (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
            		'process'				=> (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
            		'3'						=> (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
            		'over'					=> (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
            	);
            }
            return $result;
        } 
        public function getReportWay($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_response GROUP BY addBy";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
            	$sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
            	LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
            	WHERE ep_response.addBy = '".$val['addBy']."'";
            	$result_count_all = $this->query($sql_count);

            	$sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
            	LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
            	WHERE ep_response.addBy = '".$val['addBy']."' GROUP BY ep_response.`status` 
            	";
            	$query_count_status = $this->query($sql_count_status);
            	$result_status = array();
            	foreach($query_count_status->rows as $cs){
            		$result_status[$cs['status']] = $cs['count_status'];
            	}
                  $addBy = '';
                  if($val['addBy']=='0'){
                        $addBy = 'เว็บไซต์';
                  }else if($val['addBy']=='1'){
                        $addBy = 'แอปพิเคชั่น';
                  }else if($val['addBy']=='2'){
                        $addBy = 'อื่นๆ API';
                  }
            	$result[] = array(
            		'addBy' 				=> $addBy,
            		'count_all'				=> $result_count_all->row['count_all'],
            		'0'						=> (int)(isset($result_status[0])?$result_status[0]:''),
            		'complete'				=> (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
            		'process'				=> (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
            		'3'						=> (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
            		'over'					=> (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
            	);
            }
            return $result;
        } 
        public function getReportZone($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_part";
            $resultTopic = $this->query($sql)->rows;
            $where = "";
            // if($province_id){
            //       $where = " AND ep_response.province_id = ".$province_id;
            // }
            foreach($resultTopic as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  LEFT JOIN PROVINCE ON ep_response.id_provinces = PROVINCE.PROVINCE_ID 
                  WHERE PROVINCE.id_part = '".$val['id_part']."' 
                  ".$where."
                  ";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  LEFT JOIN PROVINCE ON ep_response.id_provinces = PROVINCE.PROVINCE_ID  
                  WHERE PROVINCE.id_part = '".$val['id_part']."' 
                  ".$where."
                   GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }
                  if($result_count_all->row['count_all']>0){
                        $result[] = array(
                              'agency'                       => str_replace(' ','',$val['agency']),
                              'title'                       => str_replace(' ','',$val['title']),
                              'count_all'                   => $result_count_all->row['count_all'],
                              'waiting'                     => (int)(isset($result_status[0])?$result_status[0]:''),
                              'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                              'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                              'day7'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                              'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                        );
                  }
            }
            // exit();
            return $result;
        } 
        public function getReportMission($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_agency";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response_status.id_agency = '".$val['id']."'";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response_status.id_agency = '".$val['id']."'  GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }

                  $result[] = array(
                        'agency_title'                => $val['agency_title'],
                        'count_all'                   => $result_count_all->row['count_all'],
                        '0'                           => (int)(isset($result_status[0])?$result_status[0]:''),
                        'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                        'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                        '3'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                        'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                  );
            }
            return $result;
        } 
        public function getDashboardHome($province_id=0){
            $result = array();
            $sql = "SELECT * FROM ep_topic";
            $resultTopic = $this->query($sql)->rows;
            $where = "";
            // if($province_id){
            //       $where = " AND ep_response.province_id = ".$province_id;
            // }
            foreach($resultTopic as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.topic_id = '".$val['id']."' 
                  ".$where."
                  ";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.topic_id = '".$val['id']."' 
                  ".$where."
                   GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }
                  if($result_count_all->row['count_all']>0){
                        $result[] = array(
                              'title'                       => str_replace(' ','',$val['topic_title']),
                              'count_all'                   => $result_count_all->row['count_all'],
                              'waiting'                     => (int)(isset($result_status[0])?$result_status[0]:''),
                              'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                              'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                              'day7'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                              'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                        );
                  }
            }
            // exit();
            return $result;
        } 
        public function getReportLand($data = array()){
            $result = array();
            $sql = "SELECT * FROM PROVINCE";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.id_provinces = '".$val['PROVINCE_ID']."'";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.id_provinces = '".$val['PROVINCE_ID']."'  GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }

                  $result[] = array(
                        'title'                       => $val['PROVINCE_NAME'],
                        'count_all'                   => $result_count_all->row['count_all'],
                        '0'                           => (int)(isset($result_status[0])?$result_status[0]:''),
                        'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                        'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                        '3'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                        'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                  );
            }
            return $result;
      }
      public function getReportLandLimit5($data = array()){
            $result = array();
            $sql = "SELECT * FROM PROVINCE";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.id_provinces = '".$val['PROVINCE_ID']."'";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status FROM ep_response_status 
                  LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.id_provinces = '".$val['PROVINCE_ID']."'  GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }
                  $i=0;
                  if($result_count_all->row['count_all']>0){
                        if($i==5){
                              break;
                        }
                        $result[] = array(
                              'title'                       => $val['PROVINCE_NAME'],
                              'count_all'                   => $result_count_all->row['count_all'],
                              '0'                           => (int)(isset($result_status[0])?$result_status[0]:''),
                              'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                              'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                              '3'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                              'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                        );
                        $i++;
                  }
            }
            return $result;
        } 
      public function getReportProblem($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_topic";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response 
                  -- LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.topic_id = '".$val['id']."'";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status 
                  FROM ep_response  
                  -- LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.topic_id = '".$val['id']."'  GROUP BY ep_response.`status` 
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }

                  $result[] = array(
                        'title'                       => $val['topic_title'],
                        'count_all'                   => $result_count_all->row['count_all'],
                        '0'                           => (int)(isset($result_status[0])?$result_status[0]:''),
                        'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                        'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                        '3'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                        'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                  );
            }
            return $result;
      }
      public function getReportType($data = array()){
            $result = array();
            $sql = "SELECT * FROM ep_topic_sub";
            $resultAgencyMinor = $this->query($sql)->rows;
            foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response 
                  -- LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.sub_topic_id = '".$val['id']."'";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status 
                  FROM ep_response 
                  -- LEFT JOIN ep_response ON ep_response_status.id_response = ep_response.id 
                  WHERE ep_response.sub_topic_id = '".$val['id']."'  GROUP BY ep_response.`status`  
                  ";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }

                  $result[] = array(
                        'title'                       => $val['title'],
                        'count_all'                   => $result_count_all->row['count_all'],
                        '0'                           => (int)(isset($result_status[0])?$result_status[0]:''),
                        'complete'                    => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                        'process'                     => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                        '3'                           => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                        'over'                        => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                  );
            }
            return $result;
      }

      public function getStatus($data = array()){
            $result = array();
            // $sql = "SELECT * FROM ep_topic_sub";
            // $resultAgencyMinor = $this->query($sql)->rows;
            // foreach($resultAgencyMinor as $val){
                  $sql_count = "SELECT count(ep_response.id) AS count_all FROM ep_response ";
                  $result_count_all = $this->query($sql_count);

                  $sql_count_status = "SELECT ep_response.`status`,count(ep_response.`status`) as count_status 
                  FROM ep_response GROUP BY ep_response.`status`";
                  $query_count_status = $this->query($sql_count_status);
                  $result_status = array();
                  foreach($query_count_status->rows as $cs){
                        $result_status[$cs['status']] = $cs['count_status'];
                  }

                  $result = array(
                        'count_all'  => $result_count_all->row['count_all'],
                        '0'          => (int)(isset($result_status[0])?$result_status[0]:''),
                        'complete'   => (int)(isset($result_status[1])?$result_status[1]:''), //ร้องทุกข์ที่ดำเนินการเสร็จสิ้นแล้ว
                        'process'    => (int)(isset($result_status[2])?$result_status[2]:''), //ร้องทุกข์อยู่ระหว่างการดำเนินการ
                        '7day'       => (int)(isset($result_status[3])?$result_status[3]:''), //ร้องทุกข์อีก 7 วันจะครบกำหนด
                        'over'       => (int)(isset($result_status[4])?$result_status[4]:''), //ร้องทุกข์ที่ยังไม่เสร็จ และช้ากว่ากำหนด
                  );
            // }
                  // exit();
            return $result;
      }
      public function getListsDetail($data = array()){
            $result = array();

            $sql = "SELECT *,ep_response.id AS id FROM ep_response 
            LEFT JOIN ep_topic ON ep_response.topic_id = ep_topic.id 
            LEFT JOIN PROVINCE ON ep_response.`id_provinces` = PROVINCE.`PROVINCE_id`";
            $result_detail = $this->query($sql);
            foreach($result_detail->rows as $val){
                  $id = $val['id'];
                  $sql_get_last_agency = "SELECT * FROM ep_response_status
                        LEFT JOIN ep_agency_minor ON  ep_response_status.id_agency_minor = ep_agency_minor.id 
                        LEFT JOIN ep_agency ON ep_agency.id = ep_agency_minor.id_agency 
                         WHERE ep_response_status.id_response = '".$id."' ORDER BY ep_response_status.id DESC LIMIT 0,1";
                  $query_agency = $this->query($sql_get_last_agency);

                  // $sql_get_last_comment = "SELECT * FROM ep_response_comment
                  //    LEFT JOIN ep_agency_minor ON  ep_response_status.id_agency_minor = ep_agency_minor.id 
                  //    LEFT JOIN ep_agency ON ep_agency.id = ep_agency_minor.id_agency 
                  //     WHERE ep_response_status.id_response = '".$id."' ORDER BY ep_response_status.id DESC LIMIT 0,1";
                  // $query_agency = $this->query($sql_get_last_comment);

                  $result[] = array(
                        'case_code' => $val['case_code'],
                        'topic_title' => $val['topic_title'],
                        'PROVINCE_NAME' => $val['PROVINCE_NAME'],
                        'dateadd' => $val['dateadd'],
                        'agency' => $query_agency->row
                  );
            }
            return $result;
      }
    }
?>