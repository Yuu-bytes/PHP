<?php
include 'conecta.php';
include 'funcoes.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despesas</title>
</head>

<body>
    <div style="width: 80%; margin: 0 auto; padding: 10px;">
        <form name="frm" method="post">
            Nome a Pesquisar <input type="text" name="PESQUISA" />
            Grupo <?php CriaCombo("grupos", "NomeGrupo", "CodigoGrupo", "0"); ?>
            <input type="submit" value="Pesquisar" />
        </form><br>
        <table border="1" class="table table-striped table-hover">
            <tr class="thead-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>Grupo</th>
                <th></th>
            </tr>
            <?php
            $filtrosDiversos = "";
            $palavra_pesquisar = "";
            $grupo = "0";
            if (isset($_POST['PESQUISA'])) {
                $palavra_pesquisar = $_POST['PESQUISA'];
                $grupo = $_POST['CodigoGrupo'];
                if ($_POST['CodigoGrupo'] != "0")
                    $filtrosDiversos = " and d.CodigoGrupo = $grupo";
            }
            $consulta = $con->query("select * from despesas d inner join grupos g on (d.CodigoGrupo = g.CodigoGrupo) where NomeDespesa like '%$palavra_pesquisar%' $filtrosDiversos");
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $registro->CodigoDespesa . "</td>";
                echo "<td>" . $registro->NomeDespesa . "</td>";
                echo "<td>" . $registro->NomeGrupo . "</td>";
            ?>
                <td>
                    <a href="despesas_editar.php?op=alt&id=<?php echo $registro->CodigoDespesa; ?>"><i class="material-icons" style="color: blue;">edit</i></a>
                    <a href="javascript: confirma('despesas_excluir.php?id=<?php echo $registro->CodigoDespesa ?>','<?php echo $registro->NomeDespesa ?>')"><i class="material-icons" style="color:red">delete</i></a>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
        </table>
        <a href="despesas_editar.php?op=inc" class="btn btn-success">Incluir</a>
    </div>
    <?php
    include 'janela.html';
    include 'estilos.html';
    ?>
</body>

</html>