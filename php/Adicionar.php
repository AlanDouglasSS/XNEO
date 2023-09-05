<?php
require 'config.php';

// Verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    // O usuário não está autenticado, redireciona para a página de login ou realiza alguma ação adequada
    header("Location: login.php"); // Substitua pelo caminho da página de login
    exit(); // Encerra o script
}

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $inicio = $_POST['inicio'];
    $prazo = $_POST['prazo'];
    $userId = $_SESSION['user_id']; // Obtém o ID do usuário da sessão

    // Utilize prepared statements para evitar injeção de SQL
    $sql = "INSERT INTO atividade (nome, descricao, data_inicio, data_final, id_usuario) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $descricao, $inicio, $prazo, $userId]);

    header("Location: ../dashboard.html");
    exit(); // Encerra o script
}
?>

<head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 75px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form input[type="text"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        form label {
            font-weight: bold;
        }
    </style>
</head>

<body>

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
    
</body>
