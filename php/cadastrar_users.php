<?php
$dns = "mysql:dbname=gerenciamento_task;host=127.0.0.1";
$login = "root";
$pass = "";

try {
    $pdo = new PDO($dns, $login, $pass);

    if(isset($_POST['nome']) && !empty($_POST['nome']) &&
       isset($_POST['email']) && !empty($_POST['email']) &&
       isset($_POST['senha']) && !empty($_POST['senha'])){

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);

        
        header("Location: ../index.html");
        exit;
    }
}catch(PDOException $e){    
    echo "Conexão falhou: " . $e->getMessage();
}
?>

<head>
    <link rel="stylesheet" href="../assets/style/cadastrar_user.css">
</head>
<body>

    <form action="" method="POST">
        Nome:<br/>
        <input type="text" name="nome"/><br/>
        E-mail:<br/>
        <input type="text" name="email"/><br/>
        Senha:<br/>
        <input type="password" name="senha"/><br/>
            
        <input type="submit" value="Cadastrar">
    </form>
    
</body>


<!--============================DOCUMENTAÇÃO===========================

PROPRIEDADES:

$dns: 
Armazena a string de conexão com o banco de dados. 
Essa string define o tipo de banco de dados, o nome do 
banco de dados, o host e outras informações necessárias 
para estabelecer a conexão.

$login: 
Armazena o nome de usuário usado para autenticar 
a conexão com o banco de dados. Geralmente, é o nome de 
usuário do banco de dados.

$pass: Armazena a senha usada para autenticar a conexão 
com o banco de dados. Geralmente, é a senha do banco de dados.

MÉTODOS:

query(): 
É um método do objeto PDO que executa uma 
consulta SQL no banco de dados. No código, é usado 
para executar a consulta de inserção de dados no banco de dados.

FUNÇÕES:

require(): 
É uma função do PHP que inclui e executa o arquivo 
especificado. No código, é usado para incluir o arquivo 
"config.php", que contém as informações de conexão com o banco de dados.

isset(): 
É uma função do PHP que verifica se uma variável 
está definida e não é nula. No código, é usada para verificar 
se os campos do formulário (como "nome", "email" e "senha") 
estão definidos antes de prosseguir com o processamento.

empty(): 
É uma função do PHP que verifica se uma variável está vazia. 
No código, é usada para verificar se os campos do formulário 
estão preenchidos antes de prosseguir com o processamento.

addslashes(): 
É uma função do PHP que escapa caracteres especiais em uma 
string, adicionando uma barra invertida antes deles. 
No código, é usada para escapar os valores dos campos 
"nome", "email" e "senha" antes de serem inseridos na consulta SQL.

header(): 
É uma função do PHP que envia um cabeçalho HTTP. No código, 
é usada para redirecionar o usuário para a página "index.html" 
após o cadastro do usuário.

exit(): 
É uma função do PHP que encerra a execução do script. 
No código, é usada para interromper a execução após 
o redirecionamento do usuário.

=============================-->


