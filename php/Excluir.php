<?php
require 'config.php';

if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM atividade WHERE ID_atividade= '$id'";
    $pdo->query($sql);

    header("Location: ../dashboard.html");

}else{
    header("Location: ../dashboard.html");
}


?>