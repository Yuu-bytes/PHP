<?php include 'pag_funcoes.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
    #geral {
        margin: 0 auto;
        width: 900px;
        height: 800px;
        background-color: antiquewhite;
    }
    #menu {
        width: 900px;
        height: 50px;
        background-color: lightcoral;
    }
</style>
<body>
    <div id="geral">
        <div id="menu">
            <?php include 'pag_menu.php'; ?>
        </div>
        <h1>Página 01</h1>
        <?php 
            $valorA = 62;
            $valorB = 814;
            $soma = calcula($valorA, $valorB);
            $quadrado = quadrado($valorA);
            echo "<h1>Valor da soma: $soma</h1>";
            echo "<h1>Valor do quadrado: $quadrado</h1>";
        ?>
    </div>
</body>
</html>