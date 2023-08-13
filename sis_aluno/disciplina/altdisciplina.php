
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
    $sql = "SELECT * FROM disciplina where id= :id";

    # junta o sql a conexao do banco
    $retorno = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);

    #executa a estrutura no banco
    $retorno->execute();

    #transforma o retorno em array
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
    $disciplina = $array_retorno['nomedisciplina'];
    $ch = $array_retorno['ch'];
    $semestre = $array_retorno['semestre'];
    $idprofessor = $array_retorno['idprofessor'];
    $nota1 = $array_retorno['Nota1'];
    $nota2 = $array_retorno['Nota2'];
    $media = $array_retorno['Media'];


    ?>

    <div class="container">
      
    <div class="form">
        <form method="POST" action="cruddisciplina.php">
            <div class="form-header">
                <div class="title">
                    <h1>Alterar disciplina
                    </h1>
                </div>
                <div class="login-button">
                    <button><a href="#"><input type="submit" name="update" value="Alterar"></a> </button>
                    
                </div>
            </div>

            <div class="input-group">

                <div class="input-box">
                    <label for="">disciplina</label>
                    <input id="ida" type="text" name="disciplina" placeholder="disciplina" required value="<?php echo $disciplina?>">
                </div>

                <div class="input-box">
                    <label for="">ch</label>
                    <input id="ident" type="number" name=" ch" placeholder="CH da disciplina" required value="<?php echo $ch?>">
                </div>

                <div class="input-box">
                     <label for="">semestre</label>
                     <input id="data" type="number" name="semestre" placeholder="Semestre" required value="<?php echo $semestre?>">
                </div>

                <div class="input-box">
                     <label for="">id do professor</label>
                     <input type="text" name="idprofessor" placeholder="id do professor" required value="<?php echo $idprofessor?>">
                </div>

                <div class="input-box">
                     <label for="">Nota 01</label>
                     <input type="text" name="nota1" placeholder="Insira a Nota 01" required value="<?php echo $nota1?>">
                </div>

                <div class="input-box">
                     <label for="">Nota 02</label>
                     <input type="text" name="nota2" placeholder="Insira a Nota 02" required value="<?php echo $nota2?>">
                </div>
                
                <input type="hidden" name="id" value="<?php echo $id?>">
            
            </div>
          
            </div>

            <div class="continue-button">
                <button class="button"><a href="../index.php">voltar</a></button>
            </div>
        </form>
    </div>
 
</body>

</html>
