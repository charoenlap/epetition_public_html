<?php 
    class StatusModel extends db {
        public function getLists(){
            $query = $this->query('SELECT * FROM ep_status');
            return $query->rows;
        }
        public function getList($id){
            $query = $this->query('SELECT * FROM ep_status WHERE DEPARTMENT_ID='.$id);
            return $query->row;
        }
        public function addStatus($data=array()){
            $query = $this->insert('status',$data);
            return $query;
        }
        public function updateStatus($id,$data=array()){
            $query = $this->update('status',$data,'DEPARTMENT_ID='.$id);
            return $query;
        }
    }
?>