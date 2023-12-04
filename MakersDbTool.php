<?php
//use Exception;

class MakersDbTool {
    const DBTABLE = 'makers';
    private $mysqli;

    function __construct($host = 'localhost', $user = 'root', $password = null, $db = 'cars')
    {
        $this->mysqli = new mysqli($host,$user,$password,$db);
        if ($this->mysqli->connect_errno) {
            throw new Exception($this->mysqli->connect_errno);
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }

    function createMaker($maker)
    {
        $result = $this->mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
        if (!$result)
        {
            echo "Hiba történt a $makerName beszúrása közben";
        }

        return $result;
    }

    function getAllMakers()
    {
        $result = $this->mysqli->query("SELECT * from makers");
        $makers = $result->fetch_assoc();
    
        return $makers;
    }



}




?>