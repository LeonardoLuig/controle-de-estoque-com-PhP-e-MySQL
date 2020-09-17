<?php

    $dsn = 'mysql:host=localhost;dbname=controle_estoque';
    $user = 'root';
    $pass = '';

    try{
    $conection = new PDO($dsn, $user, $pass);
}catch(PDOException $e){

    echo 'Erro ao tentar se conectar com o banco de dados!';
    
}
?>