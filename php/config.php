<?php
$dns = "mysql:dbname=gerenciamento_task;host=127.0.0.1";
$login = "root";
$pass = "";

try {
    $pdo = new PDO($dns, $login, $pass);

    // Consulta SQL para recuperar todas as atividades
    $sql = "SELECT * FROM atividade";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $activities = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $activities[] = $row;
    }

    // Retornando os dados como JSON
    echo json_encode($activities);
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}
?>
