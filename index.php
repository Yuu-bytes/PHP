<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 01</title>
</head>
<body>
    <h1>Isto é um título em HTML</h1>
    <?php
        $nome = "Michael Trage";
        $cidade = "Três de Maio";
        $salario = 1045.00;
        $salarioAnual = $salario * 12;
        echo "Nome: " . $nome . "<br>";
        echo "Cidade: " . $cidade . "<br>";
        echo "$nome mora na cidade de $cidade e possui um salário anual de $salarioAnual";
    ?>
    <h1>Nome : <?php echo"$nome" ?></h1>
    <h1>Cidade : <?php echo"$cidade" ?></h1>

    <table border="1">
        <tr>
            <th>Nome</th>
            <th><?php echo"$nome" ?></th>
        </tr>
        <tr>
            <th>Cidade</th>
            <th><?php echo"$cidade" ?></th>
        </tr>
        <tr>
            <th>Salario</th>
            <th><?php echo"$salario" ?></th>
        </tr>
        <tr>
            <th>Salario anual</th>
            <th><?php echo"$salarioAnual" ?></th>
        </tr>
    </table>
</body>
</html>