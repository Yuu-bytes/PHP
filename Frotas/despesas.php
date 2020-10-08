<?php
include 'conecta.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Grupo</th>
        </tr>
        <?php
        $consulta = $con->query("select * from despesas");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->CodigoDespesa . "</td>";
            echo "<td>" . $registro->NomeDespesa . "</td>";
            echo "<td>" . $registro->CodigoGrupo . "</td>";
            ?>
            <td>
                <a href="despesas_editar.php?op=alt">Alterar</a>
                <a href="#">Excluir</a>
            </td>
        <?php
            echo "</tr>";
        }
        ?>
    </table>
    <a href="despesas_editar.php?op=inc">Incluir</a>
</body>

</html>