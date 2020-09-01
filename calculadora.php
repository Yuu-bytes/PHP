<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $valor1Fixo = 0;
    $valor2Fixo = 0;
    $operacaoFixo = 1;
    if (isset($_COOKIE['VALOR1'])) {
        $valor1Fixo = $_COOKIE['VALOR1'];
        $valor2Fixo = $_COOKIE['VALOR2'];
        $operacaoFixo = $_COOKIE['OPERACAO'];
    }
    if (isset($_POST['VALOR1'])) {
        setcookie("VALOR1", $_POST['VALOR1'], time() + 60);
        setcookie("VALOR2", $_POST['VALOR2'], time() + 60);
        setcookie("OPERACAO", $_POST['OPERACAO'], time() + 60);
        $valor1Fixo = $_POST['VALOR1'];
        $valor2Fixo = $_POST['VALOR2'];
        $operacaoFixo = $_POST['OPERACAO'];
    }
    ?>
    <form action="" method="POST">
        <table>
            <tr>
                <td>
                    <input type="number" value=<?php echo "$valor1Fixo" ?> name="VALOR1" />
                </td>
                <td>
                    <select name="OPERACAO">
                        <option <?php if($operacaoFixo == 1) echo "selected"?> value="1">+</option>
                        <option <?php if($operacaoFixo == 2) echo "selected"?> value="2">-</option>
                        <option <?php if($operacaoFixo == 3) echo "selected"?> value="3">*</option>
                        <option <?php if($operacaoFixo == 4) echo "selected"?> value="4">/</option>
                        
                        <!-- <?php if ($operacaoFixo == 1) {
                            echo "<option selected value='1'>+</option>";
                        } else {
                            echo "<option value='1'>+</option>";
                        }
                        if ($operacaoFixo == 2) {
                            echo "<option selected value='2'>-</option>";
                        } else {
                            echo "<option value='2'>-</option>";
                        }
                        if ($operacaoFixo == 3) {
                            echo "<option selected value='3'>*</option>";
                        } else {
                            echo "<option value='3'>*</option>";
                        }
                        if ($operacaoFixo == 4) {
                            echo "<option selected value='4'>/</option>";
                        } else {
                            echo "<option value='4'>/</option>";
                        }
                        ?> -->
                        
                    </select>
                </td>
                <td>
                    <input type="number" value=<?php echo "$valor2Fixo" ?> name="VALOR2" />
                </td>
                <td>
                    <input type="submit" value="CALCULAR">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['VALOR1']) && ($_POST['VALOR2']) && is_numeric($_POST['VALOR1']) && ($_POST['VALOR2']) && !is_null($_POST['VALOR1']) && ($_POST['VALOR2'])) {
        $valor1 = $_POST['VALOR1'];
        $valor2 = $_POST['VALOR2'];
        $operacao = $_POST['OPERACAO'];
        $resultado;
        if ($operacao == 1) {
            $resultado = $valor1 + $valor2;
        } else if ($operacao == 2) {
            $resultado = $valor1 - $valor2;
        } else if ($operacao == 3) {
            $resultado = $valor1 * $valor2;
        } else if ($operacao == 4) {
            $resultado = $valor1 / $valor2;
        } else {
            echo "<script type='javascript'>alert('Ocorreu um erro!');";
        }
        echo "O resultado da operação é: $resultado";
    }
    ?>
</body>

</html>