<?php
    class TopicModel extends db {
        public function getTopic(){
            $sql = "SELECT * FROM ep_topic order by sort ASC";
            $result = $this->query($sql)->rows;
            return $result;
        }
    }
?>