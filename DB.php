<?php

class DB
{
    protected $mysqli;

    function __construct($host='localhost', $user = 'root', $password= null,  $database = 'cars')
    {
        $this->mysqli = mysqli_connect($host,$user,$password,$database);

        if(!$this->mysqli)
        {
            die("connection failed: " . mysqli_connect_error());
        }
    }

    function _destruct()
    {
        $this->mysqli->close();
    }

}











?>