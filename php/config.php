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

        // Consulta SQL para verificar as credenciais do usuário
        $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user_id'] = $user['ID_usuario']; // Armazena o ID do usuário na sessão
            header('Location: ../dashboard.html?usuarioId=' . $user['ID_usuario']); // Redireciona o usuário para a página dashboard.html com o ID do usuário como parâmetro
            exit;
        } else {
            echo json_encode(['message' => 'Credenciais inválidas']);
            exit;
        }
    } elseif (isset($_SESSION['user_id'])) {
        // O usuário está logado, busca as atividades associadas ao usuário
        $userId = $_SESSION['user_id'];

        // Consulta SQL para buscar as atividades do usuário logado
        $sql = "SELECT * FROM atividade WHERE id_usuario = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $activities = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $activities[] = $row;
        }

        // Retornando os dados como JSON
        echo json_encode($activities);
    } else {
        echo json_encode(['message' => 'Usuário não autenticado']);
    }
} catch (PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}
?>
