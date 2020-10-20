<?php 

if (isset($_GET['cep'])){
    include 'conecta.php';
    $excluir = $con->prepare("delete from cidades where Cep = ?");
        $excluir->bindParam(1, $_GET['cep']);
        if(!$excluir->execute()){ // verifica se ocorreu um erro
            print_r($excluir->errorInfo()); // se ocorreu um erro, mostra o erro
        } else {
            header("Location: cidades.php"); // se não ocorreu erro, vai para a página de listagem
        }
    }

?>