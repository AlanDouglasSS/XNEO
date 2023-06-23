<?php
require 'config.php';

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $inicio = addslashes($_POST['inicio']);
    $prazo = addslashes($_POST['prazo']);

    $sql = "INSERT INTO atividade (nome, descricao, data_inicio, data_final) VALUES ('$nome', '$descricao', '$inicio', '$prazo')";
    $pdo->query($sql);

    header("Location: ../index.html");
    exit; // Finaliza o script após o redirecionamento
}
?>>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Tarefa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Adicionar Tarefa</h1>

    <form action="" method="POST">
        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" id="nome"/><br/>
        <label for="descricao">Descrição:</label><br/>
        <input type="text" name="descricao" id="descricao"/><br/>
        <label for="inicio">Início:</label><br/>
        <input type="date" name="inicio" id="inicio"/><br/>
        <label for="prazo">Prazo:</label><br/>
        <input type="date" name="prazo" id="prazo"/><br/>    
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
