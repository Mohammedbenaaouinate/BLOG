<?php
   $server="127.0.0.1";
   $username="root";
   $password="";
   $db="pubp";
   try{
        $con=new PDO("mysql:host=$server;dbname=$db","$username","$password");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $e){
    die("The Connection Wrong");
     $e->getMessage();
   }

?>