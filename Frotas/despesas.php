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
            <th>Nome</th>
            <th>Grupo</th>
        </tr>
        <?php
        $consulta = $con->query("select * from despesas");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->CodigoDespesa . "</td>";
            echo "<td>" . $registro->NomeDespesa . "</td>";
            echo "<td>" . $registro->CodigoGrupo . "</td>";
            echo "<br>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>