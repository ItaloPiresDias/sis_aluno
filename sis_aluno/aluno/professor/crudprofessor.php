<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');



##cadastrar
if (isset($_GET['cadastrar'])) {
    ##dados recebidos pelo metodo GET
    $nome = $_GET["nomeprofessor"];
    $idade = $_GET["idade"];
    $id = $_GET["id"];
    $nascimento = $_GET["nascimento"];
    $cpf = $_GET["CPF"];
    $siape = $_GET["siape"];


    ##codigo SQL
    $sql = "INSERT INTO professor(nomeprofessor,idade,id,nascimento,CPF,siape) 
                VALUES('$nome','$idade','$id','$nascimento','$cpf','$siape')";

    ##junta o codigo sql a conexao do banco
    $sqlcombanco = $conexao->prepare($sql);

    ##executa o sql no banco de dados
    if ($sqlcombanco->execute()) {
        echo " <strong>OK!</strong> o professor
                $nome foi Incluido com sucesso!!!";
        echo " <button class='button'><a href='index.php'>voltar</a></button>";
    }
}
#######alterar
if (isset($_POST['update'])) {

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nomeprofessor"];
    $idade = $_POST["idade"];
    $id = $_POST["id"];
    $nascimento = $_POST["nascimento"];
    $ende = $_POST["CPF"];
    $matri = $_POST["siape"];


    ##codigo sql
    $sql = "UPDATE  professor SET nomeprofessor= :nomeprofessor, idade= :idade, nascimento= :nascimento, cpf= :cpf, siape= :siape WHERE id= :id ";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':nomeprofessor', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
    $stmt->bindParam(':CPF', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':siape', $siape, PDO::PARAM_STR);


    $stmt->execute();



    if ($stmt->execute()) {
        echo " <strong>OK!</strong> o professor
             $nome foi Alterado com sucesso!!!";

        echo " <button class='button'><a href='index.php'>voltar</a></button>";
    }
}


##Excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `professor` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->execute()) {
        echo " <strong>OK!</strong> o professor
             $id foi excluido!!!";

        echo " <button class='button'><a href='listaprofessores.php'>voltar</a></button>";
    }
}