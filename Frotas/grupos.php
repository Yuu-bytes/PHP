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
        </tr>
        <?php
        $consulta = $con->query("select * from grupos");
        while ($registro = $consulta->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . $registro->CodigoGrupo . "</td>";
            echo "<td>" . $registro->NomeGrupo . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>