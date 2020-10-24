<?php
    define("HOST","mysql:host=localhost;dbname=securedb");
    define("USERNAME","root");
    define("PASSWORD","1234");
    
    //Define PDO Connection
    try{
    $con = new PDO(HOST,USERNAME,PASSWORD);
    }
    catch(PDOException $ex){
        echo "Connection failed".$ex->getMessage();
    }
?>