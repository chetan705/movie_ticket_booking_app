<?php
class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="online_movie_ticket_booking";

    public $conn;
    
    function __construct()
    {

       $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
       if($this->conn->connect_error)
       {
        die("Connection Failed");
       }
       /* else
       {
        echo "connected";
       } */

    }

    function select_all($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $result=$this->conn->query($sql);
        return $result;
    }

    function select_movie($table_name,$date)
    {
        if($date=="comingsoon")
        {
            $sql = "SELECT * FROM $table_name Where rel_date > now()";
            $result=$this->conn->query($sql);
            return $result;

        }
        else
        {
            $sql = "SELECT * FROM $table_name Where rel_date < now()";
            $result=$this->conn->query($sql);
            return $result;

        }
        
    }

    function select($table_name,$id)
    {
        $sql = "SELECT * FROM $table_name where id=$id";
        $result=$this->conn->query($sql);
        return $result;
    }
    function select_login($table_name,$email)
    {
        $sql = "SELECT * FROM $table_name where email =$email";
        $result=$this->conn->query($sql);
        return $result;
    }


    function insert($query,$msg)
    {
       if($this->conn->query($query)===TRUE) 
       {
        echo '<script> alert("'.$msg.'");</script>';
        /* echo "inserted"; */

       }
       else
       {
        echo '<script> alert("'.$this->conn->error.'");</script>';
        /* echo $this->conn->error; */
       }

    }



}




?>