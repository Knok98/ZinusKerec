<?php
class DbMain
{
    public $conn;
    public array $error = [];
    protected string $erInstance;
    public function __construct()
    {
        $this->erInstance = uniqid();
        $this->conn = new mysqli('localhost', 'root', '', 'zinuskerec');
        if ($this->conn->connect_errno) {
            $this->addError($this->conn->connect_error);
            return false;
        }
    }
    public function addError($err)
    {
        array_push($this->error, $err);
    }

    public function __destruct()
    {
        if ($this->conn instanceof mysqli) {
            $this->conn->close();
        }
    }
    public function process(string $sql,string $type)
    {    
        if (!$this->conn instanceof mysqli) {
            $this->addError("attempt to connect to nonexisting mysql");
            return false;
        }
        $prepareSql = $this->conn->prepare($sql);
        $prepareSql->execute();
        if ($prepareSql->errno) {
            $this->addError($prepareSql->error);
            return false;
        }
        $result = $prepareSql->get_result();
        $return = [];
        if($type=="all"){
        while ($row = $result->fetch_assoc()) {
            $return[] = $row;
        }
        
        return $return;
        }
        if($type=="single"){
            return $prepareSql->get_result();
        }
    }

    public function getInstance(): string
    {
        $_SESSION[$this->erInstance] = json_encode($this->error);
        return $this->erInstance;
    }
}
