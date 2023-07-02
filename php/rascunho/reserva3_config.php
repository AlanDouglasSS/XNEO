<?php

session_start();

$dns = "mysql:dbname=gerenciamento_task;host=127.0.0.1";
$login = "root";
$pass = "";

try {
    $pdo = new PDO($dns, $login, $pass);

    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta SQL para verificar se o usuário existe
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $_SESSION['error'] = 'Usuário inexistente';
            header('Location: ../login.html');
            exit;
        }

        // Verifica se a senha está correta
        if ($senha != $user['senha']) {
            $_SESSION['error'] = 'Credenciais inválidas';
            header('Location: ../login.html');
            exit;
        }

        // Se chegou aqui, as credenciais estão corretas, armazena o ID do usuário na sessão
        $_SESSION['user_id'] = $user['ID_usuario'];
        header('Location: ../dashboard.html?usuarioId=' . $user['ID_usuario']);
        exit;
    } elseif (isset($_SESSION['user_id'])) {
        // Se o usuário estiver autenticado, busca as atividades associadas a ele
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM atividade WHERE ID_usuario = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $atividades = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retorna as atividades em formato JSON
        header('Content-Type: application/json');
        echo json_encode($atividades);
        exit;
    } else {
        $_SESSION['error'] = 'Usuário não autenticado';
        header('Location: ../login.html');
        exit;
    }
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}


?>