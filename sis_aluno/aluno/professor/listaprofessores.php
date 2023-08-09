<?php
/*
 * Melhor prática usando Prepared Statements
 * 
 */
require_once('conexao.php');

$retorno = $conexao->prepare('SELECT * FROM professor');
$retorno->execute();

?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>IDADE</th>
            <th>DATA NASCIMENTO</th>
            <th>CPF</th>
            <th>SIAPE</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php foreach ($retorno->fetchall() as $value) { ?>
        <tr>
            <td> <?php echo $value['id'] ?> </td>
            <td> <?php echo $value['nomeprofessor'] ?> </td>
            <td> <?php echo $value['idade'] ?> </td>
            <td> <?php echo $value['nascimento'] ?> </td>
            <td> <?php echo $value['CPF'] ?> </td>
            <td> <?php echo $value['siape'] ?> </td>

            <td>
                <form method="POST" action="altprofessor.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="alterar" type="submit">Alterar</button>
                </form>

            </td>

            <td>
                <form method="GET" action="cruprofessor.php">
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