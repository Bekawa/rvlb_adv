<?php

session_start();

//Defining Database Setting
define("Db_host","localhost");
define("Db_username","root");
define("Db_password","");
define("Db_name","rift_valley");

include ("connection.php");
$connection_class = new connection;
$connection = $connection_class->Connection_func();


//input Validation
function validateInput($connection,$input) {
    return mysqli_real_escape_string($connection, $input);
}
