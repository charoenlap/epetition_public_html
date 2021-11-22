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
    }
?>