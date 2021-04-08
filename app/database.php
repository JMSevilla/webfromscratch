<?php

define("myserver", "localhost");
define("myusername", "root");
define("mypassword", "");
define("mydbname", "dbwebdeveloper");

try 
{
    //mysql:host=localhost;dbname=dbwebdeveloper,root,""
    $pdo = new PDO("mysql:host=" . myserver . ";dbname=" . mydbname, myusername, mypassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $exception)
{
    die("Could not connect to the database"  . $exception->getMessage());
}