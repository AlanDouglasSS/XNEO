<?php
require 'config.php';
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $inicio = addslashes($_POST['inicio']);
    $prazo = addslashes($_POST['prazo']);
    


    $sql = "INSERT INTO atividade SET nome = '$nome', descricao= '$descricao', data_inicio= '$inicio', data_final= '$prazo'";
    $pdo->query($sql);

    header("Location: index.php");
}
?>

<form action="" method="POST">

    Nome:<br/>
    <input type="text" name="nome"/><br/>
    Descrição:<br/>
    <input type="text" name="descricao"/><br/>
    Início:<br/>
    <input type="date" name="inicio"/><br/>
    Prazo:<br/>
    <input type="date" name="prazo"/><br/>    
    <input type="submit" value="Cadastrar">

</form>