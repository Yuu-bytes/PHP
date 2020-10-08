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
            <th>Emdereço</th>
            <th>CEP</th>
            <th></th>
        </tr>
        <?php
        $consulta = $con->query("select * from fornecedores");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->CodigoFornecedor . "</td>";
            echo "<td>" . $registro->NomeFornecedor . "</td>";
            echo "<td>" . $registro->EnderecoFornecedor . "</td>";
            echo "<td>" . $registro->Cep . "</td>";
        ?>
            <td>
                <a href="fornecedores_editar.php?op=alt&id=<?php echo $registro->CodigoFornecedor; ?>">Alterar</a>
                <a href="#">Excluir</a>
            </td>
        <?php
            echo "</tr>";
        }
        ?>
    </table>
    <a href="fornecedores_editar.php?op=inc">Incluir</a>
</body>

</html>