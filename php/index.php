<?php
require 'config.php';
?>

<a href="Adicionar.php">Adicionar novo usuário!</a>

<table border="0" width="100%"> 


    <tr>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Início</th>
        <th>Prazo</th>
    </tr>
    <?php
    $sql = "SELECT * FROM atividade";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0){

        foreach($sql->fetchAll() as $users){
            echo '<tr>';
            echo '<td>'.$users['nome'].'</td>';
            echo '<td>'.$users['descricao'].'</td>';
            echo '<td>'.$users['data_inicio'].'</td>';
            echo '<td>'.$users['data_final'].'</td>';
            echo '<td> <a href="editar.php?id='.$users['ID_atividade'].'">Editar</a> - <a href="Excluir.php?id='.$users["ID_atividade"].'">Excluir</a></td>';
            echo '</tr>';
        }
    }else{
        echo "Erro!";
    }
    ?>
    

</table>