<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recebido de outra página</h1>
<?php 
if (isset($_POST['NOME']) && ($_POST['CIDADE']) && ($_POST['ESCOLA']) && ($_POST['IDADE'])){
        $nome = $_POST['NOME'];
        $cidade = $_POST['CIDADE'];
        $escola = $_POST['ESCOLA'];
        $idade = $_POST['IDADE'];
        echo "Meu nome é <b>$nome</b>, sou da cidade de $cidade e estudo na escola $escola e tenho $idade anos";
    }
    ?>
</body>
</html>