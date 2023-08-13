<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style3.css">
    <title>Document</title>
</head>
<body>
    
<?php
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('../conexao.php');

$retorno = $conexao->prepare('SELECT * FROM disciplina');
$retorno->execute();

?>

<div class="container">

<div class="topo">
    <table>
    <thead>
      
    <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CARGA HORARIA</th>
            <th>SEMESTRE</th>
            <th>ID PROFESSOR</th>
            <th>NOTA 01</th>
            <th>NOTA 02</th>
            <th>MEDIA</th>
        </tr>
      
    </thead>
    </div>
    
    <div class="meio">
    <tbody>
        <tr>
            <?php foreach ($retorno->fetchall() as $value) { ?>
        <tr>
         
        
          <td id="informacao" > <?php echo $value['id'] ?> </td>
            <td > <?php echo $value['nomedisciplina'] ?> </td>
            <td> <?php echo $value['ch'] ?> </td>
            <td> <?php echo $value['semestre'] ?> </td>
            <td> <?php echo $value['idprofessor'] ?> </td>
            <td> <?php echo $value['Nota1'] ?> </td>
            <td> <?php echo $value['Nota2'] ?> </td>    
            <td> <?php echo $value['Media'] ?> </td>
           
            <td id="botao">
               
                <form method="POST" action="altdisciplina.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="alterar" type="submit"> <p>Alterar</p>   </button>
                </form>
             
            </td>
          
            <td id="botao" >
                <form method="GET" action="cruddisciplina.php">
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
echo "<button class='button button3'><a href='../index.php'>  voltar</a></button>";

?>
</div>
</div>

</body>
</html>