<?php
    class SettingModel extends db {
        public function updateSettingContent($data=array()){
            $contact = (isset($data['contact'])?$data['contact']:'');
            $footer = (isset($data['footer'])?$data['footer']:'');
            $agreement = (isset($data['agreement'])?$data['agreement']:'');
            $data_content = array(
                'value' => $contact
            );
            $this->update('setting_content',$data_content,"name='contact'");

            $data_footer = array(
                'value' => $footer
            );
            $this->update('setting_content',$data_footer,"name='footer'");

            $data_agreement = array(
                'value' => $agreement
            );
            $this->update('setting_content',$data_agreement,"name='agreement'");
        }
        public function updateSettingBanner($data=array()){
            $this->insert('setting_banner',$data);
        }
        public function getList(){
            $result = array();
            $query_contact = $this->getdata('setting_content',"name='contact'")->row;
            $query_footer = $this->getdata('setting_content',"name='footer'")->row;
            $query_agreement = $this->getdata('setting_content',"name='agreement'")->row;
            $result = array(
                'contact' => $query_contact['value'],
                'footer' => $query_footer['value'],
                'agreement' => $query_agreement['value'],
            );
            return $result;
        }
        public function getMasterSetting($name=''){
            $result = array();
            $result = $this->getdata('settings',"name='".$this->escape($name)."'")->row['val'];
            return $result;
        }
        public function getTopic(){
            $result = array();
            $result = $this->getdata('topic')->rows;
            return $result;
        }
        public function getlistField(){
            $result = array();
            $result = $this->getdata('setting_hide_data')->rows;
            return $result;
        }
        public function getLog(){
            $result = array();
            $result = $this->query('SELECT * FROM LOG_HISTORY ORDER BY AUT_LOG_ID DESC LIMIT 0,30')->rows;
            return $result;
        }
        public function getSubTopic($id=0){
            $result = array();
            $result = $this->getdata('topic_sub',"topic_id=".(int)$id)->rows;
            return $result;
        }
        public function getSubTopicConfig($id=0){
            $result = array();
            $result = $this->getdata('topic_sub',"id=".(int)$id)->row;
            return $result;
        }
        public function updategetMasterSetting($data=array()){
            $query = $this->update('settings',array('val'=>$data['val']),"name='".$data['name']."'");
            return $query;
        }
        public function setSubTopicConfigDaysProcess($id=0,$val=''){
            $query = $this->update('topic_sub',array('days_process'=>$val),"id='".$id."'");
            return $query;
        }
        public function setSubTopicConfigDaysEnd($id=0,$val=''){
            $query = $this->update('topic_sub',array('days_end'=>$val),"id='".$id."'");
            return $query;
        }
        public function updategetMasterSettings($data=array()){
            foreach($data as $val){
                $query = $this->update('settings',array('val'=>$val['val']),"name='".$val['name']."'");
            }
            return $query;
        }
        public function updateSetting($id,$data=array()){
            $query = $this->update('settings',$data,'id='.$id);
            return $query;
        }
        // คำนำหน้า
        public function prefixLists(){
            $query = $this->query("SELECT * FROM ep_prefix where del = '0' order by id desc"); 
            return $query->rows;
        }
        public function getBanners(){
            $query = $this->query("SELECT * FROM ep_setting_banner where del = '0' order by id desc"); 
            return $query->rows;
        }
        public function getHideTopicSub(){
            $return = array();
            $query = $this->query("SELECT * FROM ep_setting_hide_take"); 
            foreach($query->rows as $val){
                $return[] = array(
                    'id_hide_data'  => $val['id_hide_data'],
                    'id_topic'      => $val['id_topic'],
                    'id_sub_topic'  => $val['id_sub_topic'],
                    'status'        => $val['status']
                );
            }
            return $return;
        }
         public function changeHide($id=0,$val=0,$id_topic=0,$id_topic_sub=0){
            $return = array();
            $sql = "DELETE FROM ep_setting_hide_take 
                        WHERE 
                    id_hide_data = '".(int)$id."' 
                    AND id_topic = ".(int)$id_topic."
                    AND id_sub_topic = ".(int)$id_topic_sub;
            $query = $this->query($sql); 

            $data_insert = array(
                'id_hide_data'  => $id,
                'id_topic'      => $id_topic,
                'id_sub_topic'  => $id_topic_sub,
                'status'        => $val
            );
            $this->insert('setting_hide_take',$data_insert);
            return $return;
        }
        public function deleteBanner($id=0){
            $query = $this->query("UPDATE ep_setting_banner SET del=1 WHERE id = '".(int)$id."'"); 
            return true;
        }
        public function changeRequire($id=0,$val=0){
            $query = $this->query("UPDATE ep_setting_hide_data SET required=".$val." WHERE id = '".(int)$id."'"); 
            return true;
        }
        public function prefixDetail($id){
            $query = $this->getdata('prefix','id='.$id);
            return $query->row;
        }
        public function insertPrefix($data){
            $query = $this->insert('prefix',$data);
            return $query;
        }
        public function updatePrefix($id,$data){
            $query = $this->update('prefix',$data,'id='.$id);
            return $query;
        }
        public function delPrefix($id){
            $data = array(
                'del'   => '1'
            );
            $query = $this->update('prefix',$data,'id ='.$id);
            return $query;
        }


        // เขตที่ตรวจ
        public function partLists(){
            $query = $this->query("SELECT * FROM ep_part where del = '0'"); 
            return $query->rows;
        }
        public function partDetail($id){
            $query = $this->getdata('part','id_part ='.$id);
            return $query->row;
        }
        public function insertPart($data){
            $query = $this->insert('part',$data);
            return $query;
        }
        public function updatePart($id,$data){
            $query = $this->update('part',$data,'id_part ='.$id);
            return $query;
        }
        public function delPart($id){
            $data = array(
                'del'   => '1'
            );
            $query = $this->update('part',$data,'id_part ='.$id);
            return $query;
        }


        // จังหวัด
        public function provincesLists(){
            $query = $this->query("SELECT * FROM PROVINCE where del = '0'"); 
            return $query->rows;
        }
        public function provincesDetail($id){
            $query = $this->query("SELECT * FROM PROVINCE where PROVINCE_ID = '".$id."'"); 
            return $query->row;
        }
        public function insertProvinces($data){
            $name = $data['PROVINCE_NAME'];
            $date = date('Y-m-d H:i:s'); 
            $query = $this->query("INSERT INTO PROVINCE (PROVINCE_NAME,CREATE_TIMESTAMP) VALUE ('".$name."','".$date."')");
            return $query;
        }
        public function updateProvinces($id,$data){
            $PROVINCE_NAME = $data['PROVINCE_NAME'];
            $date = date('Y-m-d H:i:s'); 
            $query = $this->query("UPDATE PROVINCE set PROVINCE_NAME = '".$PROVINCE_NAME."', UPDATE_TIMESTAMP = '".$date."' where PROVINCE_ID = '".$id."'");
            return $query;
        }
        public function delProvinces($id){
            $del = '1';
            $query = $this->query("UPDATE PROVINCE set del = '".$del."' where PROVINCE_ID = '".$id."'");
            return $query;
        }


        // ตำแหน่ง
        public function positionLists(){
            $query = $this->query("SELECT * FROM ep_position where del = '0'"); 
            return $query->rows;
        }
        public function positionDetail($id){
            $query = $this->getdata('position','id='.$id);
            return $query->row;
        }
        public function insertPosition($data){
            $query = $this->insert('position',$data);
            return $query;
        }
        public function updatePosition($id,$data){
            $query = $this->update('position',$data,'id='.$id);
            return $query;
        }
        public function delPosition($id){
            $data = array(
                'del'   => '1'
            );
            $query = $this->update('position',$data,'id ='.$id);
            return $query;
        }


        // หน่วยงาน
        public function agencyLists(){
            $query = $this->query("SELECT * FROM ep_agency where del = '0'"); 
            return $query->rows;
        }
        public function agencyDetail($id){
            $query = $this->getdata('agency','id='.$id);
            return $query->row;
        }
        public function insertAgency($data){
            $query = $this->insert('agency',$data);
            return $query;
        }
        public function updateAgency($id,$data){
            $query = $this->update('agency',$data,'id='.$id);
            return $query;
        }
        public function delAgency($id){
            $data = array(
                'del'   => '1'
            );
            $query = $this->update('agency',$data,'id ='.$id);
            return $query;
        }
    }
?>