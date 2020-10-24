<?php

    if (isset($_GET['id'])){
        include 'conecta.php';
        $excluir = $con->prepare("delete from despesas where CodigoDespesa=? ");
    $excluir->bindParam(1, $_GET['id']);
    if (!$excluir->execute()) { // verifica se ocorreu um erro
        print_r($excluir->errorInfo()); // se ocorreu um erro, mostra o erro
    } else {
        header("Location: despesas.php"); // se não ocorreu erro, vai para a página de listagem
    }
    }

 ?>