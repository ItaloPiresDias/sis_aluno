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
    $sql = "SELECT * FROM aluno where id= :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $nome = $array_retorno['nomealuno'];
    $idade = $array_retorno['idade'];
    $nascimento = $array_retorno['nascimento'];
    $ende = $array_retorno['ende'];
    $matri = $array_retorno['matri'];


    ?>

    <form method="POST" action="crudaluno.php">

        <input type="text" name="nomealuno" id="" value=<?php echo $nome ?>>

        <input type="text" name="idade" id="" value=<?php echo $idade ?>>

        <input type="text" name="id" id="" value=<?php echo $id ?>>

        <input type="text" name="nascimento" id="" value=<?php echo $nascimento ?>>

        <input type="text" name="ende" id="" value=<?php echo $ende ?>>

        <input type="text" name="matri" id="" value=<?php echo $matri ?>>


        <input type="submit" name="update" value="Alterar">


    </form>
</body>

</html>