<?php
class DbGall extends DbMain
{
   
    private $id = 0;
   

    
    public function del()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM gallery WHERE id=" . $id;
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        unlink($row['odkaz']);


        $delete = "DELETE FROM gallery WHERE id=" . $id;
        $result = mysqli_query($this->conn, $delete);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM gallery ORDER BY id";
        return $this->process($sql,"all");
    }

    public function save($fileDestination)
    {
        $date = date("Y-m-d h:i:sa");
        $sql = 'INSERT INTO gallery(odkaz,datum) VALUES ("' . $fileDestination . '", "' . $date . '")';

        if ($this->conn->query($sql)) {
            echo " Record has been saved";
        }
    }

}
