<?php
include 'conecta.php';

$Cep="";
$Cidade="";
$UF="";

$titulo = "";
    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'inc') {
            $titulo = "<h1>Inclusão de Cidades</h1>";
        } else {
            $titulo = "<h1>Alteração de Cidades</h1>";
        }
    }

    if (isset($_POST['Cep']) && isset($_GET['op']) == 'inc') 
    {
        $incluir = $con->prepare("insert into cidades (Cep,Cidade,UF) " .
        "values (?,?,?) ");
        $incluir->bindParam(1, $_POST['Cep']);
        $incluir->bindParam(2, $_POST['Cidade']);
        $incluir->bindParam(3, $_POST['UF']);
        if(!$incluir->execute()){ // verifica se ocorreu um erro
            print_r($incluir->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: cidades.php"); // se não ocorreu erro, vai para a página de listagem
        }
    }

    if (isset($_POST['Cep']) && isset($_GET['op']) == 'alt') 
    {
        $alterar = $con->prepare("update cidades set Cidade=?,UF=? where Cep = ?");
        $alterar->bindParam(1, $_POST['Cidade']);
        $alterar->bindParam(2, $_POST['UF']);
        $alterar->bindParam(3, $_GET['cep']);
        if(!$alterar->execute()){ // verifica se ocorreu um erro
            print_r($alterar->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: cidades.php"); // se não ocorreu erro, vai para a página de listagem
        }
    }

    if ($_GET['op'] == 'alt') {
        $consulta = $con->prepare('select * from cidades where Cep = ?');
        $consulta->bindParam(1, $_GET['cep']);
        $consulta->execute();
        $registro = $consulta->fetch(PDO::FETCH_OBJ);
    
        $Cep = $registro->Cep;
        $Cidade = $registro->Cidade;
        $UF = $registro->UF;
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
                <td>CEP</td>
                <td><input type="text" size="40" name="Cep" value="<?php echo $Cep; ?>"/></td>
            </tr>
            <tr>
                <td>Cidade</td>
                <td><input type="text" size="50" name="Cidade" value="<?php echo $Cidade; ?>"/></td>
            </tr>
            <tr>
                <td>UF</td>
                <td><input type="text" size="10" name="UF" value="<?php echo $UF; ?>"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Gravar"/></td>
            </tr>
        </table>
    </form>
</body>

</html>