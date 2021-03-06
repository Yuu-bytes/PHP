<?php
include 'conecta.php';
include 'funcoes.php';

$NomeFornecedor = "";
$EnderecoFornecedor = "";
$Cep = "";

$titulo = "";
if (isset($_GET['op'])) {
    if ($_GET['op'] == 'inc') {
        $titulo = "<h1>Inclusão de Fornecedores</h1>";
    } else {
        $titulo = "<h1>Alteração de Fornecedores</h1>";
    }
}

// verifica se foi postado uma inclusão
if (isset($_POST['NomeFornecedor']) && $_GET['op'] == 'inc') {
    $incluir = $con->prepare("insert into fornecedores (NomeFornecedor,EnderecoFornecedor,Cep) " .
        "values (?,?,?) ");
    $incluir->bindParam(1, $_POST['NomeFornecedor']);
    $incluir->bindParam(2, $_POST['EnderecoFornecedor']);
    $incluir->bindParam(3, $_POST['Cep']);
    if (!$incluir->execute()) { // verifica se ocorreu um erro
        print_r($incluir->errorInfo()); // se ocorreu um erro, mostra o erro
    } else {
        header("Location: fornecedores.php"); // se não ocorreu erro, vai para a página de listagem
    }
}

// verifica se foi postado uma alteração
if (isset($_POST['NomeFornecedor']) && $_GET['op'] == 'alt') {
    $alterar = $con->prepare("update fornecedores set NomeFornecedor=?,EnderecoFornecedor=?,Cep=? where CodigoFornecedor=? ");
    $alterar->bindParam(1, $_POST['NomeFornecedor']);
    $alterar->bindParam(2, $_POST['EnderecoFornecedor']);
    $alterar->bindParam(3, $_POST['Cep']);
    $alterar->bindParam(4, $_GET['id']);
    if (!$alterar->execute()) { // verifica se ocorreu um erro
        print_r($alterar->errorInfo()); // se ocorreu um erro, mostra o erro
    } else {
        header("Location: fornecedores.php"); // se não ocorreu erro, vai para a página de listagem
    }
}

if ($_GET['op'] == 'alt') {
    $consulta = $con->prepare('select * from fornecedores where CodigoFornecedor = ?');
    $consulta->bindParam(1, $_GET['id']);
    $consulta->execute();
    $registro = $consulta->fetch(PDO::FETCH_OBJ);

    $NomeFornecedor = $registro->NomeFornecedor;
    $EnderecoFornecedor = $registro->EnderecoFornecedor;
    $Cep = $registro->Cep;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
    <h1><?php echo $titulo; ?></h1>

    <form name="form" method="POST">
        <table>
            <tr>
                <td>Nome</td>
                <td><input type="text" size="40" name="NomeFornecedor" value="<?php echo $NomeFornecedor; ?>" /></td>
            </tr>
            <tr>
                <td>Endereço</td>
                <td><input type="text" size="50" name="EnderecoFornecedor" value="<?php echo $EnderecoFornecedor; ?>" /></td>
            </tr>
            <tr>
                <td>CEP</td>
                <td>
                    <?php 
                        if ($_GET['op'] == 'inc') 
                            CriaCombo("cidades", "Cidade", "Cep", "");
                        else
                            CriaCombo("cidades", "Cidade", "Cep", $Cep);
                    ?>
            </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Gravar" /></td>
            </tr>
        </table>
    </form>
    </center>
</body>

</html>