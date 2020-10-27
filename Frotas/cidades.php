<?php
include 'conecta.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cidades</title>
</head>

<body>
    <div style="width: 80%; margin: 0 auto; padding: 10px;">
        <form name="frm" method="post">
            Nome a Pesquisar <input type="text" name="PESQUISA" />
            <input type="submit" value="Pesquisar" />
        </form><br>
        <table border="2" class="table table-striped table-hover table-sm">
            <tr class="thead-dark">
                <th>CEP</th>
                <th>Cidade</th>
                <th>UF</th>
                <th></th>
            </tr>
            <?php
            $palavra_pesquisar = "";
            if (isset($_POST['PESQUISA'])) {
                $palavra_pesquisar = $_POST['PESQUISA'];
            }
            $consulta = $con->query("select * from cidades where Cidade like '%$palavra_pesquisar%' ");
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $registro->Cep . "</td>";
                echo "<td>" . $registro->Cidade . "</td>";
                echo "<td>" . $registro->UF . "</td>";
            ?>
                <td>
                    <a href="cidades_editar.php?op=alt&cep=<?php echo $registro->Cep; ?>"><i class="material-icons" style="color: blue;">edit</i></a>
                    <a href="javascript: confirma('idades_excluir.php?cep=<?php echo $registro->Cep ?>','<?php echo $registro->Cidade ?>')"><i class="material-icons" style="color:red">delete</i></a>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
        </table>
        <a href="cidades_editar.php?op=inc" class="btn btn-success">Incluir</a>
    </div>
    <?php
    include 'janela.html';
    include 'estilos.html';
    ?>
</body>

</html>