<?php
require 'config.php'; //REQUISIÇÃO DE ACESSO AO BANCO

$id = 0;
//CAPTURA A ID 
if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
}


//VERIFICA QUE O USUÁRIO ENVIOU AS INFORMAÇÕES, SE NÃO ENVIOU, 
//ELE PASSA PARA O PRÓXIMO COMANDO!
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);    
    $inicio = addslashes($_POST['inicio']);
    $prazo = addslashes($_POST['prazo']);

    $sql = "UPDATE atividade SET nome='$nome', descricao= '$descricao', data_inicio='$inicio', data_final='$prazo' WHERE ID_atividade= '$id' ";
    $sql = $pdo->query($sql);

    header("Location: ../dashboard.html");
}


    
    //COM A ID CAPTURADA, ESSE COMANDO SQL VAI PEGAR AS 
    //INFORMAÇÕES DIGITADAS!
$sql = "SELECT * FROM atividade WHERE ID_atividade= '$id'"; 
$sql = $pdo->query($sql);
if($sql->rowCount() > 0){
    //VARIÁVEL DECLARADA!
    $dado = $sql->fetch(); //CAPTURANDO APENAS UM ÚNICO USUÁRIO
}else{
    header("Location: ../dashboard.html");//CAPTURANDO O LOCAL DO INDEX.PHP SE FOR O CASO!
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
            margin: 0 auto;
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
    </style>v
</head>

<body>
        <!--FORMULÁRIO DO ARQUIVO EDITAR, ATUALIZAR DADOS-->
    <form action="" method="POST">

    <!--CAPTURANDO A VARIÁVEL DECLARADA A CIMA COM PHP, NA TAG INPUT.
    E REQUISITANDO DOS DADOS NO BANCO-->
    Nome:<br/>  
    <input type="text" name="nome" value="<?php echo $dado['nome']; ?>"/><br/>
    Descrição:<br/>
    <input type="text" name="descricao" value="<?php echo $dado['descricao']; ?>"/><br/>    
    Início:<br/>
    <input type="date" name="inicio" value="<?php echo $dado['data_inicio']; ?>"><br/>
    Prazo:<br/>
    <input type="date" name="prazo" value="<?php echo $dado['data_final']; ?>"><br/>

    <!--SO V-->

    <input type="submit" value="Atualizar">

    </form>
        
</body>

