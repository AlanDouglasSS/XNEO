<?php
require 'config.php'; //REQUISIÇÃO DE ACESSO AO BANCO

$id = 0;
//CAPTURA A ID 
if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
}


//FERIFICA QUE O USUÁRIO ENVIOU AS INFORMAÇÕES, SE NÃO ENVIOU, 
//ELE PASSA PARA O PRÓXIMO COMANDO!
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);    
    $inicio = addslashes($_POST['inicio']);
    $prazo = addslashes($_POST['prazo']);

    $sql = "UPDATE atividade SET nome='$nome', descricao= '$descricao', data_inicio='$inicio', data_final='$prazo' WHERE ID_atividade= '$id' ";
    $sql = $pdo->query($sql);

    header("Location: ../index.html");
}


    
    //COM A ID CAPTURADA, ESSE COMANDO SQL VAI PEGAR AS 
    //INFORMAÇÕES DIGITADAS!
$sql = "SELECT * FROM atividade WHERE ID_atividade= '$id'"; 
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    //VARIÁVEL DECLARADA!
    $dado = $sql->fetch(); //CAPTURANDO APENAS UM ÚNICO USUÁRIO
}else{
    header("Location: ../index.html");//CAPTURANDO O LOCAL DO INDEX.PHP SE FOR O CASO!
}  
    


?>

<!--FORMULÁRIO DO ARQUIVO EDITAR, ATUALIZAR DADOS-->
<html>
<head>
    <title>Editar Tarefa</title>
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
    <h1>Editar Tarefa</h1>

    <form action="" method="POST">
        <label for="nome">Nome:</label><br/>  
        <input type="text" name="nome" value="<?php echo $dado['nome']; ?>"/><br/>
        <label for="descricao">Descrição:</label><br/>
        <input type="text" name="descricao" value="<?php echo $dado['descricao']; ?>"/><br/>    
        <label for="inicio">Início:</label><br/>
        <input type="date" name="inicio" value="<?php echo $dado['data_inicio']; ?>"><br/>
        <label for="prazo">Prazo:</label><br/>
        <input type="date" name="prazo" value="<?php echo $dado['data_final']; ?>"><br/>
    
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>