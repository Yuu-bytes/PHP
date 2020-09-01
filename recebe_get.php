<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $nome = $_GET['NOME'];
        $cidade = $_GET['CIDADE'];
        $escola = $_GET['ESCOLA'];
        $idade = $_GET['IDADE'];
        echo "Meu nome é $nome e vivo na cidade de $cidade e estudo na escola $escola e tenho $idade anos"
    ?>
</body>
</html>