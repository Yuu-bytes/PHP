<?php 
    session_start();
    if (!isset($_SESSION['LOGIN_OK'])){
    header("Location: ERRO.php");
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
    <h1>MENU</h1>
    <h3><a href="#">Clientes</a></h3>
    <h3><a href="#">Produtos</a></h3>
    <h3><a href="#">Serviços</a></h3>
    <h3><a href="#">Contato</a></h3>
    <h3><a href="index.php?Logout=1">LOGOUT</a></h3>
</body>
</html>