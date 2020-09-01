<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="formulario_recebe.php" method="POST">
    <table>
    <tr>
        <td>Nome</td>
        <td><input type="text" name="NOME"></td>
    </tr>
    <tr>
        <td>Cidade</td>
        <td><input type="text" name="CIDADE"></td>
    </tr>
    <tr>
        <td>Escola</td>
        <td><input type="text" name="ESCOLA"></td>
    </tr>
    <tr>
        <td>Idade</td>
        <td><input type="number" name="IDADE"></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" value="Gravar"></td>
    </tr>
    </table>
</form>

</body>
</html>