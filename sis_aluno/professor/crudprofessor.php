
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
    $cpf = $_GET["cpf"];
    $datanascimento = $_GET["datanascimento"];
    $endereco = $_GET["endereco"];
    $estatus = $_GET["estatus"];

    ##codigo SQL
    $sql = "INSERT INTO professor(nome,idade,cpf,datanascimento,endereco,estatus) 
                VALUES('$nome','$idade','$cpf','$datanascimento','$endereco','$estatus')";

    ##junta o codigo sql a conexao do banco
    $sqlcombanco = $conexao->prepare($sql);

    ##executa o sql no banco de dados
    if ($sqlcombanco->execute()) {
        echo " <strong>OK!</strong> o professor
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
    $cpf = $_POST["cpf"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $endereco = $_POST["estatus"];
   


    ##codigo sql
    $sql = "UPDATE  professor SET nome= :nome, idade= :idade, datanascimento= :datanascimento, cpf= :cpf, endereco= :endereco, estatus = :estatus WHERE id= :id ";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $endereco, PDO::PARAM_INT);


    $stmt->execute();



    if ($stmt->execute()) {

      
        echo " <strong>OK!</strong> o professor
             $nome foi Alterado com sucesso!!!";

        echo " <button class='button'><a href='listaprofessores.php'>voltar</a></button>";
        
    }
}



##Excluir
if  (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->execute()) {
        echo " <strong>OK!</strong> o professor foi excluido!!!";

        echo " <button class='button'><a href='listaprofessores.php'>voltar</a></button>";
    }
}


?>
</body>
</html>