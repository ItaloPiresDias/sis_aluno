<?php
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('conexao.php');

$retorno = $conexao->prepare('SELECT * FROM aluno');
$retorno->execute();

?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>IDADE</th>
            <th>DATA NASCIMENTO</th>
            <th>ENDERECO</th>
            <th>MATRICULA</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php foreach ($retorno->fetchall() as $value) { ?>
        <tr>
            <td> <?php echo $value['id'] ?> </td>
            <td> <?php echo $value['nomealuno'] ?> </td>
            <td> <?php echo $value['idade'] ?> </td>
            <td> <?php echo $value['nascimento'] ?> </td>
            <td> <?php echo $value['ende'] ?> </td>
            <td> <?php echo $value['matri'] ?> </td>

            <td>
                <form method="POST" action="altaluno.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="alterar" type="submit">Alterar</button>
                </form>

            </td>

            <td>
                <form method="GET" action="crudaluno.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="excluir" type="submit">Excluir</button>
                </form>

            </td>



        </tr>
        <?php  }  ?>
        </tr>
    </tbody>
</table>
<?php
echo "<button class='button button3'><a href='index.php'>voltar</a></button>";
?>