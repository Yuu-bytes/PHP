<?php
include 'conecta.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
            <th>Código</th>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Marca</th>
        </tr>
        <?php
        $consulta = $con->query("select * from veiculos");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->CodigoVeiculo . "</td>";
            echo "<td>" . $registro->PlacaVeiculo . "</td>";
            echo "<td>" . $registro->Modelo . "</td>";
            echo "<td>" . $registro->CodigoMarca . "</td>";
            echo "<br>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>