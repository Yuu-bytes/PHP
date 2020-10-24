<?php
include 'conecta.php';
include 'funcoes.php';

$titulo = "";
$NomeDespesa = "";
$CodigoGrupo = "";

    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'inc') {
            $titulo = "<h1>Inclusão de Despesas</h1>";
        } else {
            $titulo = "<h1>Alteração de Despesas</h1>";
        }
    }

    // verifica se foi postado uma inclusão
    if (isset($_POST['NomeDespesa']) && $_GET['op'] == 'inc') 
    {
        $incluir = $con->prepare("insert into despesas (NomeDespesa,CodigoGrupo) " .
        "values (?,?) ");
        $incluir->bindParam(1, $_POST['NomeDespesa']);
        $incluir->bindParam(2, $_POST['CodigoGrupo']);
        if(!$incluir->execute()){ // verifica se ocorreu um erro
            print_r($incluir->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: despesas.php"); // se não ocorreu erro, vai para a página de listagem
        }
    }

    // verifica se foi postado uma alteração
    if (isset($_POST['NomeDespesa']) && $_GET['op'] == 'alt') 
    {
        $alterar = $con->prepare("update despesas set NomeDespesa=?,CodigoGrupo=? where CodigoDespesa=?");
        $alterar->bindParam(1, $_POST['NomeDespesa']);
        $alterar->bindParam(2, $_POST['CodigoGrupo']);
        $alterar->bindParam(3, $_GET['id']);
        if(!$alterar->execute()){ // verifica se ocorreu um erro
            print_r($alterar->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: despesas.php"); // se não ocorreu erro, vai para a página de listagem
        }
    }

    if ($_GET['op'] == 'alt') {
        $consulta = $con->prepare('select * from despesas where CodigoDespesa = ?');
        $consulta->bindParam(1, $_GET['id']);
        $consulta->execute();
        $registro = $consulta->fetch(PDO::FETCH_OBJ);
    
        $NomeDespesa = $registro->NomeDespesa;
        $CodigoGrupo = $registro->CodigoGrupo;
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
                <td><input type="text" size="40" name="NomeDespesa" value="<?php echo $NomeDespesa; ?>" /></td>
            </tr>
            <tr>
                <td>Grupo</td>
                <td>
                    <?php 
                        if ($_GET['op'] == 'inc') 
                            CriaCombo("grupos", "NomeGrupo", "CodigoGrupo", "");
                        else
                            CriaCombo("grupos", "NomeGrupo", "CodigoGrupo", $CodigoGrupo);
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Gravar"/></td>
            </tr>
        </table>
    </form>
    </center>
</body>

</html>