<?php 
    class ResponseModel extends db {
        public function getlists(){
            $sql    = "SELECT *,a.id as id FROM ep_response a LEFT JOIN ep_topic b ON a.topic_id = b.id WHERE a.del = 0 ORDER BY a.id DESC";
            $query  = $this->query($sql);
            return $query->rows;
        }
        public function getList($id){
            $sql    = "SELECT * FROM ep_response WHERE id = '".$id."'";
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
            $query = $this->insert('response',$data);
            return $query;
        }
        public function updateResponse($data=array(),$id){
            $query = $this->update('response',$data,"id=".$id);
            return $query;
        }
    }
?>