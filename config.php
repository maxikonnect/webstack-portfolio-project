<?php
    $hostname = 'localhost';
    $username = 'abradu';
    $password = 'audiomasta12z';
    $database = 'passonetouch';

    try{
        $conn = new PDO("mysql:host=$hostname; dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connection successful";
        
    }catch(PDOException $e){
        echo "connection failed: " . $e->getMessage();
    }

?>