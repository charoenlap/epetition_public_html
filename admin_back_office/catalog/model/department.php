<?php 
    class DepartmentModel extends db {
        public function getLists(){
            $query = $this->query('SELECT * FROM DEPARTMENT');
            return $query->rows;
        }
        public function getList($id){
            $query = $this->query('SELECT * FROM DEPARTMENT WHERE DEPARTMENT_ID='.$id);
            return $query->row;
        }
        public function addDepartment($data=array()){
            $query = $this->insert('DEPARTMENT',$data,false);
            return $query;
        }
        public function updateDepartment($id,$data=array()){
            $query = $this->update('DEPARTMENT',$data,'DEPARTMENT_ID='.$id,false);
            return $query;
        }
    }
?>