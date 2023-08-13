<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>cadastro</title>
 
</head>

<body>
<?php
    require_once('../conexao.php');

    $id = $_POST['id'];

    ##sql para selecionar apens um aluno
    $sql = "SELECT * FROM professor where id= :id";

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
    $cpf = $array_retorno['cpf'];
    $endereco = $array_retorno['endereco'];
    $estatus = $array_retorno['estatus'];


    ?>

    <div class="container">
      
    <div class="form">
        <form method="POST" action="crudprofessor.php">
            <div class="form-header">
                <div class="title">
                    <h1>Alterar Professor</h1>
                </div>
                <div class="login-button">
                    <button><input type="submit" name="" value="Alterar" required></button>
                    
                </div>
            </div>

            <div class="input-group">
                <div class="input-box">
                    <label for="">nome professsor</label>
                    <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" required value="<?php echo $nome ?>">
                </div>
                

                <div class="input-box">
                    <label for="">idade</label>
                    <input id="ida" type="text" name="idade" placeholder="Digite sua idade" required value="<?php echo $idade ?>">
                </div>

            

                <div class="input-box">
                     <label for="">data nascimento</label>
                     <input id="data" type="date" name=" datanascimento" placeholder="Digite sua data de nascimento" required value="<?php echo $datanascimento ?>">
                </div>

                <div class="input-box">
                     <label for="">cpf</label>
                     <input type="text" name="cpf" placeholder="Digite seu cpf" required value="<?php echo $cpf ?>">
                </div>

                <div class="input-box">
                    <label for="">endereco</label>
                    <input type="text" name="endereco" placeholder="Digite seu endereco " required value="<?php echo $endereco ?>">
                </div>

                <input type="hidden" name="update" value="update" required>
                <input type="hidden" name="id" value="<?php echo $id ?>" required>

            </div>
            <div class="gender-inputs">
                <div class="gender-title">
                    <h6>Status</h6>
                </div>
            
                <div class="gender-group">
                    <div class="gender-input">
                        <input id="cas" type="radio" value="0" name="estatus" checked>
                        <label for="cas">Solteiro</label>
                    </div>

                    <div class="gender-input">
                        <input id="solt" type="radio" value="1" name="estatus">
                        <label for="solt">Casado</label>
                    </div>
                </div>
            </div>

            <div class="continue-button">
                <button class="button"><a href="listaprofessores.php">voltar</a></button>
            </div>
        </form>
    </div>
 
</body>

</html>