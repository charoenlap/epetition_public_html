<?php
    class TopicModel extends db {
        public function getTopic(){
            $sql = "SELECT * FROM ep_topic order by sort ASC";
            $result = $this->query($sql)->rows;
            return $result;
        }
        public function getTopicSub(){
            $result = array();
            $sql = "SELECT * FROM ep_topic WHERE topic_title !='' order by sort ASC";
            $result_topic = $this->query($sql);
            if($result_topic->num_rows){
                foreach($result_topic->rows as $val){
                    $sql_sub = "SELECT * FROM ep_topic_sub WHERE topic_id = ".(int)$val['id'];
                    $result_sub = $this->query($sql_sub);
                    $result[] = array(
                        'rows'  => $val,
                        'sub'       => $result_sub->rows
                    );
                }

            }
            return $result;
        }
        public function getTopicDetail($id){
            $sql = "SELECT * FROM ep_topic WHERE id = ".(int)$id;
            $result = $this->query($sql)->row;
            return $result;
        }
    }
?>