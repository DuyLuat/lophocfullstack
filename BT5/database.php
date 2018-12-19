<?php
class database{
    private $connection=null;
    public function connect($hostName, $username, $password, $databaseName){
        $this->connection=new mysqli($hostName, $username, $password, $databaseName);
        if($this->connection->connect_error){
            echo 'Không thể kết nối CSDL';
            exit();
        }
    }
    public function insert($table, $data){
        $fields=implode(', ', array_keys($data));
        $questionMarks=str_repeat('?,',count($data));
        $questionMarks=substr($questionMarks, 0,-1);
        $sql="INSERT INTO $table($fields) VALUES($questionMarks)";
        // echo $sql;
        // die();
        $types=str_repeat("s",count($data));
        $values=array_values($data);
        //print_r($values);die();
        $statment=$this->connection->prepare($sql);
        $statment->bind_param ($types,...$values);
        $statment->execute();
    }

    public function getSingle($table, $id){ 
        $sql="SELECT * FROM $table WHERE id=?";
        $statment=$this->connection->prepare($sql);
        $statment->bind_param("i", $id);
        $statment->execute();
        $result=$statment->get_result();
        if($result->num_rows()==0){
            return null;
        }
        return $result->fetch_object();
    }
    public function update($table, $data, $id){ 
        $tmp='';
        for($i=0;$i<count($data);$i++){
            $tmp .=array_keys($data)[$i]."='".array_values($data)[$i] ."',";
        }
       
        $tmp=substr($tmp, 0,-1);

        $sql="UPDATE $table SET $tmp  WHERE id=?";
        // echo $sql;
        // die();
        $statment=$this->connection->prepare($sql);
        $statment-> bind_param("i", $id);
        $statment->execute();

    }

    public function dellRow($table, $id){ 
        $sql="DELETE FROM $table WHERE id=?";
        $statment=$this->connection->prepare($sql);
        $statment->bind_param("i", $id);
        $statment->execute();
    }
}