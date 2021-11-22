<?php 
    class TopicModel extends db {
        public function getLists(){
            $query = $this->getdata('topic');
            return $query->rows;
        }
        public function getList($id){
            $query = $this->getdata('topic','id='.$id);
            return $query->row;
        }
        public function addTopic($data=array()){
            $query = $this->insert('topic',$data);
            return $query;
        }
        public function updateTopic($id,$data=array()){
            $query = $this->update('topic',$data,'id='.$id);
            return $query;
        }
        public function sortEdit($id,$data=array()){
            $query = $this->update('topic',$data,'id ='.$id);
            return $query;
        }
    }
?>