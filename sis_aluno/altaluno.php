<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style4.css">
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
    $nome = $array_retorno['nome'];
    $idade = $array_retorno['idade'];
    $datanascimento = $array_retorno['datanascimento'];
    $endereco = $array_retorno['endereco'];
    $estatus = $array_retorno['estatus'];


    ?>

<div class="container">
    <form method="POST" action="crudaluno.php">
     
     <div class="meio">

     <h1>Alterar dados</h1>
        
     <h3> nome<input type="text" name="nome" id="" value=<?php echo $nome ?>></p>

       <h3>idade <input type="text" name="idade" id="" value=<?php echo $idade ?>></p>

        <h3 >ID:<input  id="id" type="text" name="id" id="" value=<?php echo $id ?>></p>

        <h3>data de nascimento<input type="text" name="datanascimento" id="" value=<?php echo $datanascimento ?>></p>

       <h3> endereço<input type="text" name="endereco" id="" value=<?php echo $endereco ?>></p>

        <h3>Status<input type="text" name="estatus" id="" value=<?php echo $estatus ?>></p>


        <input id="alterar" type="submit" name="update" value="Alterar">

        </div>

    </form>

    </div>
</body>

</html>