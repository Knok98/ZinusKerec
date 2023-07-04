<?php


class DbTorii extends DbMain
{
    

       
    public function addUser($user,$pass){
        $sql = 'INSERT INTO admin(name,password) VALUES ("' . $user . '", "' . $pass . '")';

        if ($this->conn->query($sql)) {
            echo " Record has been saved";
        }
    }

}
