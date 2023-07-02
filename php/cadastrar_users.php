<?php
require 'config.php';

if(isset($_POST['nome']) && !empty($_POST['nome']) &&
   isset($_POST['email']) && !empty($_POST['email']) &&
   isset($_POST['senha']) && !empty($_POST['senha'])) {

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $pdo->query($sql);

    header("Location: ../dashboard.html");
    exit;
}
?>

<form action="" method="POST">
    Nome:<br/>
    <input type="text" name="nome"/><br/>
    E-mail:<br/>
    <input type="text" name="email"/><br/>
    Senha:<br/>
    <input type="password" name="senha"/><br/>
        
    <input type="submit" value="Cadastrar">
</form>
