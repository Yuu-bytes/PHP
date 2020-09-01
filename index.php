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
     // Funções Strings 
     $frase = "Hoje é segunda-feira";
     echo "Quantidade de caractéres da frase: " . strlen($frase);
     echo "<br>Quantidade de Palavras na frase: " . str_word_count($frase);
     echo "<br> Palavras invertidade: " . strrev($frase);
     echo "<br>Posição palavra: " . strpos($frase, "dia");
     echo "<br>Substitui : " . str_replace("segunda", "terça", $frase);
     echo "<br><br>";

     // Funções Númericas
    echo "PI: " .pi();
    echo "<br>Valor mínimo: " . min(0,3,0,4,6,-100);
    echo "<br>Valor máximo: " . max(0,3,0,4,6,-100);
    echo "<br>Valor absoluto: " . abs(-100);
    echo "<br>Raiz quadrada: " . sqrt(64);
    echo "<br>Arredonda: " . round(64,67);
    $numero = rand(0, 1000);
    echo "<br>Numero alatório: " . $numero;

    if ($numero >= 900){
        echo "<br>Número Maior que 900";
    }
    elseif ($numero >= 500){
        echo "<br>Número Maior que 500";
    } else {
        echo "<br>Número Menor que 500";
    }

     echo "<br><br>";
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