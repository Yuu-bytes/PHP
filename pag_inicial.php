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
        <h1>Página Inicial</h1>
        <?php
        $valorA = 100;
        $valorB = 20;

        $soma = calcula($valorA, $valorB);
        $quadrado = quadrado($valorA);
        echo "<h1>Valor da soma: $soma</h1>";
        echo "<h1>Valor do quadrado: $quadrado</h1>";

        ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nome</td>
                    <td><input type="text" name="NOME"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Gravar"></td>
                </tr>
            </table>
        </form>

        <?php 
            if (isset($_POST['NOME'])){
                $nome = $_POST['NOME'];
                $comprimento = comprimento($_POST['NOME']);
                echo "Meu nome é <b>$nome</b> e tem $comprimento caracteres nele";
            }
        ?>
    </div>
</body>

</html>