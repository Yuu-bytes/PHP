<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_COOKIE['NOME_PRODUTO'])){
            echo "O produto é: " . $_COOKIE['NOME_PRODUTO'];
        } else {
            echo "<h1>O Cookie está podre!</h1>";
        }
    ?>
</body>
</html>