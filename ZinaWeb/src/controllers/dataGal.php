<?php

class DbGall
{
    private mysqli $conn;
    private $id=0;
    public array $error = [];
    private string $erInstance;

   public function __construct(){
    $this->conn=new mysqli('localhost','root','','zinuskerec');
    if ($this->conn->connect_errno) {
        $this->addError($this->conn->connect_error);
        return false;
    }
    }
   public function addError($err)
   {
       array_push($this->error, $err);
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
    public function del(){
            $id=$_GET['id'];
            $sql="SELECT * FROM gallery WHERE id=".$id;
            $result=mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_assoc($result);
            unlink($row['odkaz']);


            $delete="DELETE FROM gallery WHERE id=".$id;
            $result=mysqli_query($this->conn,$delete);
    }
   
    public function getAll(): array{
        $sql="SELECT * FROM gallery ORDER BY id";
        return $this->processSql($sql);

    }

    public function save($fileDestination){
        $date = date("Y-m-d h:i:sa");
                $sql = 'INSERT INTO gallery(odkaz,datum) VALUES ("' . $fileDestination . '", "' . $date . '")';

                if ($this->conn->query($sql)) {
                    echo " Record has been saved";
                }
    }
    
    public function getInstance(): string {
        $_SESSION[$this->erInstance] = json_encode($this->error);
        return $this->erInstance;
    }
}