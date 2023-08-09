<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');



##cadastrar
if (isset($_GET['cadastrar'])) {
    ##dados recebidos pelo metodo GET
    $iddisciplina = $_GET["iddisciplina"];
    $disciplina = $_GET["disciplina"];
    $ch = $_GET["ch"];
    $semestre = $_GET["semestre"];
    $idprofessor = $_GET["idprofessor"];
   


    ##codigo SQL
    $sql = "INSERT INTO disciplina(iddisciplina, disciplina, ch, semestre, idprofessor) 
                VALUES('$iddisciplina','$disciplina','$ch','$semestre','$idprofessor')";

    ##junta o codigo sql a conexao do banco
    $sqlcombanco = $conexao->prepare($sql);

    ##executa o sql no banco de dados
    if ($sqlcombanco->execute()) {
        echo " <strong>OK!</strong> o disciplina
                $disciplina foi Incluida com sucesso!!!";
        echo " <button class='button'><a href='index.php'>voltar</a></button>";
    }
}
#######alterar
if (isset($_POST['update'])) {

    ##dados recebidos pelo metodo POST
    $iddisciplina = $_POST["iddiscplina"];
    $disciplina = $_POST["disciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
 

    ##codigo sql
    $sql = "UPDATE  professor SET iddisciplina= :iddisciplina, disciplina= :disciplina, ch= :ch, semestre= :semestre, idprofessor = :idprofessor, WHERE id= :id ";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':iddisciplina', $iddisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':disciplina', $disciplina, PDO::PARAM_INT);
    $stmt->bindParam(':ch', $ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre', $semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor', $idprofessor, PDO::PARAM_STR);


    $stmt->execute();



    if ($stmt->execute()) {
        echo " <strong>OK!</strong> a disciplina
             $disciplina foi Alterada com sucesso!!!";

        echo " <button class='button'><a href='index.php'>voltar</a></button>";
    }
}


##Excluir
if (isset($_GET['excluir'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `disciplina` WHERE id={$id}";
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->execute()) {
        echo " <strong>OK!</strong> a disciplina
           
$disciplina foi excluida!!!";

        echo " <button class='button'><a href='listadisciplina.php'>voltar</a></button>";
    }
}