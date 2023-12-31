
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style5.css">
    <title>Document</title>
</head>
<body>
    


<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('../conexao.php');



##cadastrar
if (isset($_GET['cadastrar'])) {
    ##dados recebidos pelo metodo GET
    $nome = $_GET["nome"];
    $idade = $_GET["idade"];
    $datanascimento = $_GET["datanascimento"];
    $endereco = $_GET["endereco"];
    $estatus = $_GET["estatus"];


    ##codigo SQL
    $sql = "INSERT INTO aluno(nome,idade,datanascimento,endereco, estatus) 
                VALUES('$nome','$idade','$datanascimento','$endereco', '$estatus')";

    ##junta o codigo sql a conexao do banco
    $sqlcombanco = $conexao->prepare($sql);

    ##executa o sql no banco de dados
    if ($sqlcombanco->execute()) {
        echo " <strong>OK!</strong> o aluno
                $nome foi Incluido com sucesso!!!";
        echo " <button class='button'><a href='../index.php'>voltar</a></button>";
    }
}
#######alterar
if (isset($_POST['update'])) {

    ##dados recebidos pelo metodo POST
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];
    


    ##codigo sql
    $sql = "UPDATE  aluno SET nome= :nome, idade= :idade, datanascimento= :datanascimento, endereco= :endereco, estatus = :estatus WHERE id= :id ";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $estatus, PDO::PARAM_STR);


    $stmt->execute();



    if ($stmt->execute()) {
        echo " <strong>OK!</strong> o aluno
             $nome foi Alterado com sucesso!!!";

        echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
    }
}


##Excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `aluno` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->execute()) {
        echo " <strong>OK!</strong> o aluno
             $id foi excluido!!!";

        echo " <button class='button'><a href='listaalunos.php'>voltar</a></button>";
    }
}
?>
</body>
</html>