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
            <th>CEP</th>
            <th>Cidade</th>
            <th>UF</th>
        </tr>
        <?php
        $consulta = $con->query("select * from cidades");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->Cep . "</td>";
            echo "<td>" . $registro->Cidade . "</td>";
            echo "<td>" . $registro->UF . "</td>";
            echo "<br>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>