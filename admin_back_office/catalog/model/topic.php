<?php 
    class TopicModel extends db {
        public function getLists(){
            $query = $this->getdata('topic');
            return $query->rows;
        }
        public function delSubTopic($id=0){
            $this->query("DELETE FROM ep_topic_sub WHERE topic_id = '".$id."'");
        }
        public function addSubTopic($id=0,$val='',$sort=0){
            $insert = array(
                'topic_id' => $id,
                'title' => $val,
                'sort'  => $sort
            );
            $this->insert('topic_sub',$insert);
        }
        public function getListsSub($id){
            $query = $this->getdata('topic_sub',"topic_id = '".(int)$id."'");
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