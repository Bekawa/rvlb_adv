<?php

class Connection
{
 //   private $connection = null;
    public function Connection_func()
    {
        $connection = new mysqli(Db_host, Db_username, Db_password, Db_name);
        if ($connection->connect_error) {
            die("Database Connection Error");
        }
        return $connection;
    }
}
