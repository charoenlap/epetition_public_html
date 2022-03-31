<?php
    class SettingModel extends db {
        public function getList(){
            $query = $this->getdata('settings','id=1');
            return $query->row;
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