<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops</title>
</head>
<body>
    <form action="" method="POST">
        <table>
        <tr>
            <td>Informe o valor: </td>
            <td><input type="number" name="NUMERO"></td>
        </tr> 
        <tr>
            <td>
                <input type="submit" value="GERAR">
            </td>
        </tr>   
        </table>
    </form>
    <table border="1">
    <?php 
    if(isset($_POST['NUMERO']) && is_numeric($_POST['NUMERO']) &&  !is_null($_POST['NUMERO'])){
        $tabuada = $_POST['NUMERO'];
        for ($i=0; $i <=10; $i++){
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td> X </td>";
            echo "<td> $tabuada </td>";
            echo "<td> = </td>";
            echo "<td>" . $i*$tabuada . "</td>";
            echo "</tr>";
        }
    }
    ?>
    </table>
</body>
</html>