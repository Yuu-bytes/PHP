<?php
include 'conecta.php';
$titulo = "";
    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'inc') {
            $titulo = "<h1>Inclusão de Despesas</h1>";
        } else {
            $titulo = "<h1>Alteração de Despesas</h1>";
        }
    }

    if (isset($_POST['NomeDespesa']) && isset($_GET['op']) == 'inc') 
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


    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>

    <form name="form" method="POST">
        <table>
            <tr>
                <td>Nome</td>
                <td><input type="text" size="40" name="NomeDespesa"/></td>
            </tr>
            <tr>
                <td>Codigo Grupo</td>
                <td><input type="text" size="50" name="CodigoGrupo"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Gravar"/></td>
            </tr>
        </table>
    </form>
</body>

</html>