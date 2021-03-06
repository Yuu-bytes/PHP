<?php 

    session_start();
    if (!isset($_SESSION['NOME_USUARIO'])){
        header("Location: login.php");
    }
    include 'conecta.php';
    include 'funcoes.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>

<body>
    <div style="width: 80%; margin: 0 auto; padding: 10px;">
    <h3>Bem-Vindo <?php echo $_SESSION['NOME_USUARIO']; ?></h3>
    <form name="frm" method="post">
        Codigo <input type="text" name="Codigo"/>
        Nome a Pesquisar <input type="text" name="PESQUISA"/>
        Cidade <?php CriaCombo("Cidades", "Cidade", "Cep", "0"); ?>
        <input type="submit" value="Pesquisar"/>
    </form><br>
        <table border="2" class="table table-striped table-hover table-sm">
            <tr class="thead-dark">
                <th>Código</th>
                <th>Nome</th>
                <th>Emdereço</th>
                <th>Cidade</th>
                <th></th>
            </tr>
            <?php
            $filtrosDiversos = "";
            $palavra_pesquisar = "";
            $cidade_pesquisar = "0";
            $codigo = "";
            if (isset($_POST['PESQUISA'])){
                $palavra_pesquisar = $_POST['PESQUISA'];
                $cidade_pesquisar = $_POST['Cep'];
                $codigo = $_POST['Codigo'];
                if ($_POST['Cep'] != "0")
                    $filtrosDiversos = " and f.Cep = $cidade_pesquisar";
                if ($_POST['Codigo'] != "") 
                    $filtrosDiversos = $filtrosDiversos . " and f.CodigoFornecedor = $codigo";
            }

            $consulta = $con->query("select * from fornecedores f inner join cidades c on (f.cep = c.cep) where NomeFornecedor like '%$palavra_pesquisar%' $filtrosDiversos");
            while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $registro->CodigoFornecedor . "</td>";
                echo "<td>" . $registro->NomeFornecedor . "</td>";
                echo "<td>" . $registro->EnderecoFornecedor . "</td>";
                echo "<td>" . $registro->Cidade . "</td>";
            ?>
                <td>
                    <a href="fornecedores_editar.php?op=alt&id=<?php echo $registro->CodigoFornecedor; ?>"><i class="material-icons" style="color: blue;">edit</i></a>
                    <a href="javascript: confirma('fornecedores_excluir.php?id=<?php echo $registro->CodigoFornecedor ?>','<?php echo $registro->NomeFornecedor ?>')"><i class="material-icons" style="color:red">delete</i></a>
                </td>
            <?php
                echo "</tr>";
            }
            ?>
        </table>
        <a href="fornecedores_editar.php?op=inc" class="btn btn-success">Incluir</a>
    </div>
    <?php 
        include 'janela.html';
        include 'estilos.html';
    ?>
</body>

</html>