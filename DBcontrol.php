<?php
class DBcontrol{
    public $db_host="localhost";
    public $db_user="root";
    public $db_password= "";
    public $db_name="cloud";
    public $connection;


    public function openConnection(){
       $this->connection = new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
       if($this->connection->connect_error){
        echo "Error in connection".$this->connection->connect_error;
        return false;
       }
       else{
        return true;
       }
    }
    public function closeConnection(){
      if($this->connection){
        $this->connection->close();
      }
      else
      {
        echo "Connection is not opened";
      }
    }
    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        else
        {
          return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
    public function insert($qry){
     $result=$this->connection->query($qry);
     if(!$result){
        echo "Error".mysqli_error($this->connection);
        return false;
     }
     else{
        return $this->connection->insert_id;
     }
    }
    public function update($qry){
      $result=$this->connection->query($qry);
      if(!$result){
         echo "Error".mysqli_error($this->connection);
         return false;
      }
      else{
         return $result;
      }
     }
}

?>