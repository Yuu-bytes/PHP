<?php
include 'conecta.php';
$titulo = "";
    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'inc') {
            $titulo = "<h1>Inclusão de Grupos</h1>";
        } else {
            $titulo = "<h1>Alteração de Grupos</h1>";
        }
    }

    if (isset($_POST['NomeGrupo']) && isset($_GET['op']) == 'inc') 
    {
        $incluir = $con->prepare("insert into grupos (NomeGrupo) " .
        "values (?) ");
        $incluir->bindParam(1, $_POST['NomeGrupo']);
        if(!$incluir->execute()){ // verifica se ocorreu um erro
            print_r($incluir->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: grupos.php"); // se não ocorreu erro, vai para a página de listagem
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
                <td><input type="text" size="40" name="NomeGrupo"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Gravar"/></td>
            </tr>
        </table>
    </form>
</body>

</html>