<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    require_once('conexao.php');

    $id = $_POST['id'];

    ##sql para selecionar apens um aluno
    $sql = "SELECT * FROM professor where id= :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $retorno->bindParam(':ch', $ch, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $iddisciplina = $array_retorno['iddisciplina'];
    $disciplina = $array_retorno['disciplina'];
    $ch = $array_retorno['ch'];
    $semestre = $array_retorno['semestre'];
    $idprofessor = $array_retorno['idprofessor'];


    ?>

    <form method="POST" action="cruddisciplina.php">

        <input type="text" name="iddisciplina" id="" value=<?php echo $iddisciplina ?>>

        <input type="text" name="disciplina" id="" value=<?php echo $disciplina ?>>

        <input type="text" name="ch" id="" value=<?php echo $ch ?>>

        <input type="text" name="semestre" id="" value=<?php echo $semestre ?>>

        <input type="text" name="idprofessor" id="" value=<?php echo $idprofessor ?>>

    


        <input type="submit" name="update" value="Alterar">


    </form>
</body>

</html>