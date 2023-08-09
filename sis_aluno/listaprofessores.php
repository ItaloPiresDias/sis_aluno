<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>Document</title>
</head>
<body>
    
<?php
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('conexao.php');

$retorno = $conexao->prepare('SELECT * FROM aluno');
$retorno->execute();

?>

<div class="container">

<div class="topo">
    <table>
    <thead>
      
    <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>IDADE</th>
            <th>DATA NASCIMENTO</th>
            <th>CPF</th>
            <th>ENDERECO</th>
        </tr>
      
    </thead>
    </div>
    
    <div class="meio">
    <tbody>
        <tr>
            <?php foreach ($retorno->fetchall() as $value) { ?>
        <tr>
         
        
          <td id="informacao" > <?php echo $value['id'] ?> </td>
            <td > <?php echo $value['nome'] ?> </td>
            <td> <?php echo $value['idade'] ?> </td>
            <td> <?php echo $value['datanascimento'] ?> </td>
            <td> <?php echo $value['cpf'] ?> </td>
            <td> <?php echo $value['endereco'] ?> </td>
           
            <td id="botao">
               
                <form method="POST" action="altprofessor.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="alterar" type="submit"> <p>Alterar</p>   </button>
                </form>
             
            </td>
          
            <td id="botao" >
                <form method="GET" action="crudaluno.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="excluir" type="submit"> <p> Excluir </p>  </button>
                </form>

            </td>



        </tr>
        <?php  }  ?>
        </tr>
    </tbody>
    </div>
</table>

<div class="voltar">
<?php
echo "<button class='button button3'><a href='index.php'>  voltar</a></button>";

?>
</div>
</div>

</body>
</html>