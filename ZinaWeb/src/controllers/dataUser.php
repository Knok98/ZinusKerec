<?php


class DbTorii
{
    private $conn;
    public array $error = [];
    public $passInput;
    private string $erInstance;

    public function __construct()
    {
        $this->erInstance = uniqid();
        if ($this->conn instanceof mysqli) {
            return true;
        }

        $this->conn = new mysqli('localhost', 'root', '', 'zinuskerec');
        if ($this->conn->connect_errno) {
            $this->addError($this->conn->connect_error);
            return false;
        }
    
        return true;
    }
    function __destruct()
    {
        if ($this->conn instanceof mysqli) {
            $this->conn->close();
        }
    }
    public function addError($err)
    {
        array_push($this->error, $err);
    }
    public function process($sql,$type)
    {if($type=="single"){
        if (!$this->conn instanceof mysqli) {
            $this->addError("attempt to connect to nonexisting mysql");
            return false;
        }

        $sqlQuery = $this->conn->prepare($sql);
        $sqlQuery->execute();
        if ($sqlQuery->errno) {
            $this->addError($sqlQuery->error);
            return false;
        }

        return $sqlQuery->get_result();
    }
    }
    public function addUser($user,$pass){
        $sql = 'INSERT INTO admin(name,password) VALUES ("' . $user . '", "' . $pass . '")';

        if ($this->conn->query($sql)) {
            echo " Record has been saved";
        }
    }

    public function getInstance(): string
    {
        $_SESSION[$this->erInstance] = json_encode($this->error);
        return $this->erInstance;
    }

}
