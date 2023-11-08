<?php 

class Connection
{
    private $connection = null;
    public function __construct()
    {
        $this->connection = new mysqli(Db_host,Db_username,Db_password,Db_name);
        if ($this->connection->connect_error) {
            die(" dcasdv   ". $this->connection->connect_error);

        }
        else {
            echo "successfully connected";
        }

    }}