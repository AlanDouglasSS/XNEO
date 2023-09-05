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
    <link rel="stylesheet" href="../assets/style/adicionar.css">
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
