<?php
    $dsn="mysql:host=localhost;dbname=bank";
    try{
        $pdo=new PDO($dsn,'root','');
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

?>