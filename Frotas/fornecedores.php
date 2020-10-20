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
    <div style="width: 80%; margin: 0 auto; padding: 10px;">
    <form name="frm" method="post">
        Nome a Pesquisar <input type="text" name="PESQUISA"/>
        <input type="submit" value="Pesquisar"/>
    </form><br>
        <table border="2" class="table table-striped table-hover">
            <tr class="thead-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>Emdereço</th>
                <th>Cidade</th>
                <th></th>
            </tr>
            <?php
            $palavra_pesquisar = "";
            if (isset($_POST['PESQUISA'])){
                $palavra_pesquisar = $_POST['PESQUISA'];
            }

            $consulta = $con->query("select * from fornecedores f inner join cidades c on (f.cep = c.cep) where NomeFornecedor like '%$palavra_pesquisar%'");
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $registro->CodigoFornecedor . "</td>";
                echo "<td>" . $registro->NomeFornecedor . "</td>";
                echo "<td>" . $registro->EnderecoFornecedor . "</td>";
                echo "<td>" . $registro->Cidade . "</td>";
            ?>
                <td>
                    <a href="fornecedores_editar.php?op=alt&id=<?php echo $registro->CodigoFornecedor; ?>"><i class="material-icons" style="color: blue;">edit</i></a>
                    <a href="fornecedores_excluir.php?id=<?php echo $registro->CodigoFornecedor; ?>"><span class="material-icons" style="color: red;">delete</span></a>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
        </table>
        <a href="fornecedores_editar.php?op=inc" class="btn btn-success">Incluir</a>
    </div>
    <?php 
        include 'estilos.html';
    ?>
</body>

</html>