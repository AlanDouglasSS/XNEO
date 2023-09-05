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
    <link rel="stylesheet" href="../assets/style/editar.css">
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

