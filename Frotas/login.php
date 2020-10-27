<?php
session_start();
include('conecta.php');
$senhaOK = 0;
if (isset($_POST['USUARIO'])) {
    $consulta = $con->prepare("select * from usuarios where LoginUsuario = ? and SenhaUsuario = ?");
    $consulta->bindParam(1, $_POST['USUARIO']);
    $consulta->bindParam(2, $_POST['SENHA']);
    $consulta->execute();
    if ($consulta->rowCount() > 0) { // encontrou usuário e senha
        $registro = $consulta->fetch(PDO::FETCH_OBJ);
        $_SESSION['NOME_USUARIO'] = $registro->NomeUsuario;
        header("Location: fornecedores.php");
    } else {
        $senhaOK = 1; // Login falhou
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <div style="width: 400px;margin: 0 auto;">
        <h2>Login</h2>
        <form name="frm" method="POST">
            <?php if ($senhaOK == 1) { ?>
                <div class="alert alert-danger" role="alert">
                    Senha Inválida !
                </div>
            <?php } ?>
            <table>
                <tr>
                    <td>Usuário </td>
                    <td><input size="120" type="text" class="form-control" name="USUARIO" /></td>
                </tr>
                <tr>
                    <td>Senha </td>
                    <td><input size="120" type="password" class="form-control" name="SENHA" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-success" value="Logar" /></td>
                </tr>
            </table>
            <br>
        </form>
    </div>

    <?php include 'estilos.html'; ?>

</body>

</html>