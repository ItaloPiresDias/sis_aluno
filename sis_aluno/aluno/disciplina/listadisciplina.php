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
            <th>IDDISCIPLINA</th>
            <th>DISCIPLINA</th>
            <th>CH</th>
            <th>SEMESTRE</th>
            <th>IDPROFESSOR</th>
    
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php foreach ($retorno->fetchall() as $value) { ?>
        <tr>
            <td> <?php echo $value['id'] ?> </td>
            <td> <?php echo $value['iddisciplina'] ?> </td>
            <td> <?php echo $value['disciplina'] ?> </td>
            <td> <?php echo $value['ch'] ?> </td>
            <td> <?php echo $value['semestre'] ?> </td>
            <td> <?php echo $value['idprofessor'] ?> </td>

            <td>
                <form method="POST" action="altdisciplina.php">
                    <input name="id" type="hidden" value="<?php echo $value['id']; ?>" />
                    <button name="alterar" type="submit">Alterar</button>
                </form>

            </td>

            <td>
                <form method="GET" action="disciplina.php">
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