<?php 
    session_start();
    $_SESSION['INSTITUICAO'] = "SETREM";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sessão Criada!</h1>
    <a href="sessao.php">Voltar</a>
    <a href="sessao_mostra.php?Logout=1">Logout</a>
</body>
</html>