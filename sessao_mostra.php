<?php 
    session_start();
    if (isset($_GET['Logout'])){
        session_destroy();
        header("Location: sessao.php");
    }
    if (!isset($_SESSION['INSTITUICAO'])){ //testa se não existe a sessão
        header("Location: sessao_erro.php");
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
    <h1>Sessão Criada! e seu conteudo é <?php echo $_SESSION['INSTITUICAO']; ?></h1>
    <a href="sessao.php">Voltar</a>
</body>
</html>