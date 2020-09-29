<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'inc') {
            echo "<h1>Inclusão de Fornecedores</h1>";
        } else {
            echo "<h1>Alteração de Fornecedores</h1>";
        }
    }
    ?>
</body>

</html>