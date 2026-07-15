<?php

    $host = "localhost";
    $db = "estoque_vendas";
    $user = "root";
    $pass = "";

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        //echo "conectado";
    }catch(PDOException $e){
        die("ERRO:" . $e->getMessage());
    }


?>

