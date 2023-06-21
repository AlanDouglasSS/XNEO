<?php

$dns = "mysql:dbname=gerenciamento_task;host=127.0.0.1";
$login = "root";
$pass = "";

try{
    $pdo = new PDO($dns, $login, $pass);

    echo "Conexão com sucesso!";

}catch(PDOException $e){
    echo "Conexão falhou".$e->getMessage();
}

?>