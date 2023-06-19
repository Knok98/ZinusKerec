<?php

class Database
{
    private mysqli $conn;
    private $id=0;

   public function __construct(){
    $this->conn=new mysqli('localhost','root','','zinuskerec');
   }

   private function processSql(string $sqlQuery):array {
    $prepareSql=$this->conn->prepare($sqlQuery);
    $prepareSql->execute();
    $result=$prepareSql->get_result();
    $return=[];

    while($row=$result->fetch_assoc()){
        $return[]=$row;
    }
    return $return;

    }
    private function processSqlSingle(string $sqlQuery):array {
        $prepareSql=$this->conn->prepare($sqlQuery);
        $prepareSql->execute();
        $result=$prepareSql->get_result();
        $row=$result->fetch_assoc();
       
        return $row;
    
        }
    private function processDel(string $sqlQuery):void{
        $prepareSql=$this->conn->prepare($sqlQuery);
        $prepareSql->execute();
    }
    public function unlink(): void{
        $id=$this->setId();
        $sql="SELECT * FROM gallery WHERE id=".$id;
        $row= $this->processSqlSingle($sql);
        unlink($row['odkaz']);


    }
    public function delete(): void{
        $id=$this->setId();
        $delete="DELETE FROM gallery WHERE id=".$id;
        $this->processDel($delete);
        
    }
    public function getAll(): array{
        $sql="SELECT * FROM gallery ORDER BY id";
        return $this->processSql($sql);

    }
    private function setId():string{
        return $_GET['id'];
    }
    
}